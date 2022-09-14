<?php

namespace App\Http\Controllers\api\recharge\banking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\site_config;
use App\Models\account_banks;
use App\Models\account_history;
use App\Models\client_orders;
use App\Models\history_bank;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Carbon;
use Sunra\PhpSimple\HtmlDomParser;

class CallbackBankController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
        $nd = site_config::where('name', 'transfer_code')->first();
        $this->transfer_code = $nd->value;
    }

    public function hisVcb($access_token, $phone_number, $password)
    {
        $dataPost = array(
            "access_token" => "$access_token", //token từ hệ thống
            "username" => "$phone_number", //Tài khoản bank
            "password" => "$password", //Mật khẩu bank
            "accountNumber" => "$phone_number", //Số tài khoản cần lấy lịch sử
            "bank" => "vcb", //Ngân hàng cần lấy lsgd
            "day" => 1 //Ngày lấy lịch sử gần nhất
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apigiare.com/api/getTransHistory",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($dataPost),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "accept: application/json"
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function hisMomo($access_token, $phone_number)
    {
        $dataPost = array(
            "access_token" => $access_token, //token từ hệ thống
            "phone" => $phone_number, //số điện thoại Momo muốn lấy giao dịch
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apigiare.com/api/getHistoryMomo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($dataPost),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "accept: application/json"
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        //hiện kết quả
        return $response;
    }

    public function hisMbbank($access_token, $phone_number, $password)
    {
        $dataPost = array(
            "access_token" => "$access_token", //token từ hệ thống
            "username" => "$phone_number", //Tài khoản bank
            "password" => "$password", //Mật khẩu bank
            "accountNumber" => "$phone_number", //Số tài khoản cần lấy lịch sử
            "bank" => "mbb", //Ngân hàng cần lấy lsgd
            "day" => 1 //Ngày lấy lịch sử gần nhất
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apigiare.com/api/getTransHistory",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($dataPost),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "accept: application/json"
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function thesieure()
    {
        $tsr = account_banks::where('bank_name', 'thesieure')->first();
        $min_bank = $tsr->min_bank;
        $url = url('Thesieure/tsr.php');
        $client = new Client();
        $response = $client->request('GET', $url);
        $body = $response->getBody();
        $body = json_decode($body, true);
        $data = [];
        $data = $body;
        //return response()->json($body);
        foreach ($data as $value) {
            $mgd = $value['trading_code'];
            $amount = $value['amount'];
            $amount = str_replace('+', '', $amount);
            $amount = str_replace(',', '', $amount);
            $amount = str_replace('đ', '', $amount);
            $io = $value['io'];
            $content_send = $value['content_send'];
            if ($min_bank >= $amount || $io == '+1') {
                $checkMgd = history_bank::where('transid', $mgd)->first();
                if (!$checkMgd) {
                    $userid = str_replace($this->transfer_code, '', $content_send);
                    $user = User::find($userid);
                    $new_money = $user->money + $amount;
                    $new_total_charge = $user->total_charge + $amount;
                    if ($user) {
                        history_bank::create([
                            'type' => 'banking',
                            'username' => $user->username,
                            'bank_name' => 'thesieure',
                            'thucnhan' => $amount,
                            'name' => $user->name,
                            'status' => 'Success',
                            'transid' => $mgd,
                        ]);
                        $user->update([
                            'money' => $new_money,
                            'total_charge' => $new_total_charge,
                        ]);
                        account_history::create([
                            'username' => $user->username,
                            'content' => "Bạn vừa nạp tiền thesieure số tiền $amount",
                        ]);
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }
    }
}
