<?php

namespace App\Http\Controllers\api\recharge\banking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\site_config;
use App\Models\User;
use App\Http\Controllers\api\recharge\banking\CallbackBankController;
use App\Models\account_banks;
use App\Models\history_bank;
use Carbon\Carbon;
use App\Models\account_history;
// thuê api huycode
class ApiCallbackBankingController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
        $this->callback = new CallbackBankController();
        $transfer_code = site_config::where('name', 'transfer_code')->first()->value;
        $this->transfer_code = $transfer_code;
    }

    public function vietcombank()
    {
        $acc = account_banks::where('bank_name', 'vietcombank')->first();
        $token = $acc->token;
        $phone_number = $acc->account_number;
        $password = $acc->password;
        $min_bank = $acc->min_bank;
        $data = $this->callback->hisVcb($token, $phone_number, $password);
        $data = json_decode($data, true);
        if ($data['success'] = true) {
            foreach ($data['data'] as $key => $value) {
                $CD = $value['CD'];
                $amount = $value['Amount'];
                $amount = str_replace(',', '', $amount);
                $Description = $value['Description'];
                $Pctime = $value['PCTime'];
                $Description = explode('.', $Description);
                $mgd = $Description[1];
                $code = $Description[2];
                if ($amount >= $min_bank || $CD == '+') {
                    $checkMgd = history_bank::where('transid', $mgd)->first();
                    if (!$checkMgd) {
                        $idUser = str_replace($this->transfer_code, '', $code);
                        $user = User::find($idUser);
                        if ($user) {
                            $newMoney = $user->money + $amount;
                            $new_total_charge = $user->total_charge + $amount;
                            $user->money = $newMoney;
                            $user->total_charge = $new_total_charge;
                            $user->save();
                            history_bank::create([
                                'username' => $user->username,
                                'transid' => $mgd,
                                'thucnhan' => $amount,
                                'type' => 'banking',
                                'bank_name' => 'vietcombank',
                                'status' => 'Success',
                                'name' => $user->username,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                            account_history::create([
                                'username' => $user->username,
                                'content' => 'Bạn đã nạp tiền từ ngân hàng vcb với số tiền là: ' . $amount . ' VNĐ',
                                'created_at' => Carbon::now(),
                            ]);
                            return true;
                        } else {
                        }
                    } else {
                    }
                }
            }
        }
    }

    public function momo()
    {
        $acc = account_banks::where('bank_name', 'momo')->first();
        $access_token = $acc->token;
        $phone = $acc->account_number;
        $min_bank = $acc->min_bank;
        $data = $this->callback->hisMomo($access_token, $phone);
        $data = json_decode($data, true);
        // var_dump($data);
        if ($data['success'] == true) {
            /* echo "<pre>";
            print_r($data['data']);
            echo "</pre>"; */
            foreach ($data['data'] as $key => $value) {
                $mgd = $value['transId'];
                $io = $value['io'];
                $partnerName = $value['partnerName'];
                $amount = $value['amount'];
                $comment = $value['comment'];
                if ($amount >= $min_bank) {
                    if ($io == '1') {
                        $checkMgd  = history_bank::where('transid', $mgd)->first();
                        if ($checkMgd) {
                            continue;
                        } else {
                            $idUser = str_replace($this->transfer_code, '', $comment);
                            $user = User::find($idUser);
                            if ($user) {
                                $newMoney = $user->money + $amount;
                                $new_total_charge = $user->total_charge + $amount;
                                $user->money = $newMoney;
                                $user->total_charge = $new_total_charge;
                                $user->save();
                                history_bank::create([
                                    'username' => $user->username,
                                    'transid' => $mgd,
                                    'thucnhan' => $amount,
                                    'type' => 'banking',
                                    'bank_name' => 'momo',
                                    'status' => 'Success',
                                    'name' => $partnerName,
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now()
                                ]);
                                account_history::create([
                                    'username' => $user->username,
                                    'content' => 'Bạn đã nạp tiền từ ngân hàng momo với số tiền là: ' . $amount . ' VNĐ',
                                    'created_at' => Carbon::now(),
                                ]);
                                return true;
                            } else {
                                return "no";
                            }
                        }
                    }
                }
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Lỗi kết nối']);
        }
    }

    // thuê api huy
    public function mbbank()
    {
        $acc = account_banks::where('bank_name', 'mbbank')->first();
        $token = $acc->token;
        $phone_number = $acc->account_number;
        $password = $acc->password;
        $min_bank = $acc->min_bank;
        $mbbank = $this->callback->hisMbbank($token, $phone_number, $password);
        // var_dump($mbbank);
        $mbbank = json_decode($mbbank, true);
        if ($mbbank['success'] == true) {
            /* echo "<pre>";
            print_r($mbbank);
            echo "</pre>"; */
            foreach ($mbbank['data'] as $key => $value) {
                //$partherPhone = $value['benAccountNo'];
                $creditAmount = $value['creditAmount'];
                $refNo = $value['refNo'];
                $availableBalance = $value['availableBalance'];
                $description = $value['description'];

                $comment = str_replace("MB ", "", $description);
                $comment = explode(".", $comment);
                $comment = $comment[0];
                $iduser = str_replace($this->transfer_code, "", $comment);
                if ($creditAmount == 0) {
                    continue;
                } elseif ($creditAmount >= $min_bank) {
                    $checkMgd = history_bank::where('transid', $refNo)->first();
                    if ($checkMgd) {
                        continue;
                    } else {
                        $user = User::find($iduser);
                        if (!$user) {
                            continue;
                        } else {
                            $new_money = $user->money + $creditAmount;
                            $new_total_charge = $user->total_charge + $creditAmount;
                            $user->money = $new_money;
                            $user->total_charge = $new_total_charge;
                            $user->save();
                            history_bank::create([
                                'username' => $user->username,
                                'transid' => $refNo,
                                'thucnhan' => $creditAmount,
                                'type' => 'banking',
                                'bank_name' => 'mbbank',
                                'status' => 'Success',
                                'name' => $user->username,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                            account_history::create([
                                'username' => $user->username,
                                'content' => 'Bạn đã nạp tiền từ ngân hàng Mb với số tiền là: ' . $creditAmount . ' VNĐ',
                                'created_at' => Carbon::now(),
                            ]);
                            return true;
                        }
                    }
                } else {
                    return response()->json(['error' => 'Không hợp lệ'], 200);
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => $mbbank['message']]);
        }
    }
}
