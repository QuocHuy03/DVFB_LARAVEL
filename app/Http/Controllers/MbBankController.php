<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MbBank;
use Illuminate\Http\Request;

class MbBankController extends Controller
{
    private $user = "0775502724";
    private $pass = "19102003Huycoder";
    private $softTokenId_goc = "bfc0c155-00c1-478b-9a4c-ee35e41f52e5";
    private $deviceId_goc = "c58c7339-97c2-ebdb-8400-573696596480";
    private $deviceIdCommon_goc = "c58c7339-97c2-ebdb-8400-573696596480";
    private $useragent = "Mozilla/5.0 (Linux; Android 7.1.2; ASUS_Z01QD Build/N2G48H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.120 Mobile Safari/537.36";
    private $URL = array(
        "LOGIN" => "https://mobile.mbbank.com.vn/retail_lite/common/activeDevice",
        "getBalance" => "https://mobile.mbbank.com.vn/retail_lite/account/v2.0/getBalance",
        "INFO" => "https://mobile.mbbank.com.vn/retail_lite/loan/getUserInfo",
        "GET_TOKEN" => "https://mobile.mbbank.com.vn/retail_lite/loyal/getToken",
        "GET_NOTI" => "https://mobile.mbbank.com.vn/retail_lite/notification/getNotificationDataList"
    );
    public function apimb()
    {
        $result = $this->login();
        if ($result["result"]["message"] == "Customer is invalid" || $result["result"]["ok"] == false) {
            return array(
                "status" => "error",
                "code" => 500,
                "message" => "Tên Đăng Nhập Hoặc Mật Khẩu Sai"
            );
        } else {
            $this->refNo = $result["refNo"];
            $this->sessionId = $result["sessionId"];
            $thongbao = $this->notify();
            $notify = $this->xuly_notify($thongbao);
            // return $notify;
            foreach ($notify as $key => $value) {
                if ($value['type'] == '+') {
                    $checkMGD = MbBank::where('transactionId', $value['transactionId'])->first();
                    if (!$checkMGD) {

                        $str = $value['description'];
                        $cuphap = "Nap";   /// gọi từ database setting vào tùy
                        $pattern = '/' . $cuphap . '(.+)()/';
                        if (preg_match($pattern, $str, $matches)) {
                            $tachId = $matches[1];
                            $user_id = explode(" ", $tachId)[0];
                            $updateUser = User::find($user_id);
                            if (!empty($updateUser)) {
                                $saveData = MbBank::create([
                                    'accountNo' => $value['accountNo'],
                                    'transactionId' => $value['transactionId'],
                                    'creditAmount' => $value['creditAmount'],
                                    'transactionDate' => $value['transactionDate'],
                                    'availableBalance' => $value['availableBalance'],
                                    'description' => $value['description'],
                                    'id_username' => $user_id
                                ]);

                                $updateUser->money += $value['creditAmount'];
                                $updateUser->save();
                            }
                        }
                    }
                }
            }
        }
    }
    public function notify()
    {
        $header = array(
            "Host:mobile.mbbank.com.vn",
            "User-Agent:" . $this->useragent,
            "Cache-Control: no-cache",
            "Authorization: Basic QURNSU46QURNSU4=",
            "Connection: close",
        );
        $data = '{
            "refNo":"' . $this->refNo . '",
            "sessionId":"' . $this->sessionId . '",
            "fromRows":0,
            "toRows":20,
            "deviceIdCommon":"' . $this->deviceIdCommon_goc . '",
            "appVersion":"android_13.1_v482"
        }';
        return $this->CURL("GET_NOTI", $header, $data);
    }


    private function xuly_notify($thongbao)
    {
        $notify = $thongbao["notificationBusinessList"];
        $list = [];
        for ($i = 0; $i < count($notify); $i++) {
            $data = $notify[$i];
            if ($data["notiType"] == "MSG_NOTI_BDSD_T24_CHUDONG") {
                $text = $data["body"];
                $taikhoan = explode('TK ', explode('|', $text)[0])[1];
                $info = explode('|', $text)[1];
                $tach = explode(' ', $info);
                $biendong = $tach[1];
                $deviant = str_replace(array('+', '-'), array('', ''), explode('VND', $biendong)[0]);
                $time = $tach[2] . " " . $tach[3] . ":00";
                $vnd = explode('|', $text)[2];
                $sodu = explode('VND', explode('SD:', $text)[1])[0];
                $config = explode('|', $text)[3];
                if (strpos($config, 'ND: ') !== false) {
                    $nd = explode('ND: ', $config)[1];
                } else {
                    $nd = $config;
                }
                array_push($list, array(
                    "accountNo" => $taikhoan, #tài khoản
                    "transactionId" => $data["notiId"], #mã giao dịch
                    "creditAmount" => str_replace(array(',', '.'), array('', ''), $deviant), #số tiền giao dịch
                    "type" => $biendong[0], #1 = cộng tiền, -1 = trừ tiền
                    "currency" => "VND",
                    "transactionDate" => $time, #thời gian
                    "availableBalance" => $sodu, #số dư
                    "description" => $nd #nội dung giao dịch
                ));
            }
        }
        return $list;
    }
    public function login()
    {
        $header = array(
            "Host: mobile.mbbank.com.vn",
            "User-Agent: " . $this->useragent,
            "Cache-Control: no-cache",
            "Authorization: Basic QURNSU46QURNSU4=",
            "Connection: close"
        );

        $softTokenId = $this->softTokenId_goc;
        $deviceId = $this->deviceId_goc;
        $deviceIdCommon = $this->deviceIdCommon_goc;
        $data = '{
            "refNo":"0792623572-202241484355267243",
            "userId":"' . $this->user . '",
            "password":"' . md5($this->pass) . '",
            "softTokenId":"' . $softTokenId . '",
            "deviceId":"' . $deviceId . '",
            "deviceIdCommon":"' . $deviceIdCommon . '",
            "appVersion":"android_13.1_v482"
        }';
        return $this->CURL("LOGIN", $header, $data);
    }

    private function CURL($Action, $header, $data)
    {
        $Data = is_array($data) ? json_encode($data) : $data;
        $curl = curl_init();
        $header[] = 'Content-Type: application/json; charset=utf-8';
        $header[] = 'accept: application/json';
        $header[] = 'Content-Length: ' . strlen($Data);
        $opt = array(
            CURLOPT_URL => $this->URL[$Action],
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POST => empty($data) ? FALSE : TRUE,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_CUSTOMREQUEST => empty($data) ? 'GET' : 'POST',
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_ENCODING => "",
            CURLOPT_COOKIEJAR => $this->user . ".txt",
            CURLOPT_COOKIEFILE => $this->user . ".txt",
            CURLOPT_HEADER => FALSE,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_TIMEOUT => 20,
        );
        curl_setopt_array($curl, $opt);
        $body = curl_exec($curl);
        if (is_object(json_decode($body))) {
            return json_decode($body, true);
        }
        return json_decode($body, true);
    }
}
