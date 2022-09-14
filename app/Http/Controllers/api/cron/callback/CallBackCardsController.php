<?php

namespace App\Http\Controllers\api\cron\callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\site_config;
use GuzzleHttp\Client;
use App\Models\history_bank;
use App\Models\account_history;
use Illuminate\Support\Carbon;
use App\Models\User;

class CallBackCardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function callbackTTvPay(Request $request)
    {
        $TaskId = $request->TaskId;
        $Pin = $request->Pin;
        $Seri = $request->Seri;
        $CardValue = $request->CardValue;
        $Success = $request->Success;
        $Hash = $request->Hash;
        $requestid = $request->requestid;
        $amount = $request->amount;
        $declared_value = $request->declared_value;

        $chietkhau = site_config::where('name', 'card_discount')->first()->value;
        $partner_key = site_config::where('name', 'parther_key')->first()->value;
        $tien_nhan = $amount - ($amount * $chietkhau / 100);

        $callback_sign = md5($partner_key . $Pin . $Seri);

        if ($Hash == $callback_sign) {
            $history = history_bank::where([
                'type' => 'card',
                'transid' => $requestid,
            ])->first();
            if (!$history) {
                die();
            } else {
                if ($callback_sign != md5($partner_key . $Pin . $Seri)) {
                    die();
                } else {
                    if ($Success == true) {
                        history_bank::where([
                            'type' => 'card',
                            'transid' => $requestid,
                        ])->update([
                            'status' => 1,
                            'thucnhan' => $tien_nhan,
                            'updated_at' => Carbon::now(),
                        ]);
                        account_history::create([
                            'username' => $history->username,
                            'content' => 'Nạp thẻ cào thành công',
                            'created_at' => Carbon::now(),
                        ]);
                        User::where('username', $history->username)->increment([
                            'money' => $tien_nhan,
                            'total_charge' => $tien_nhan,
                        ]);
                    } else {
                        history_bank::where([
                            'type' => 'card',
                            'transid' => $requestid,
                        ])->update([
                            'status' => 2,
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }
            }
        }
    }

    public function callbackTSR(Request $request)
    {
        $status = $request->status;
        $code = $request->code;
        $serial = $request->serial;
        $thucnhan = $request->thucnhan;
        $transid = $request->request_id;
        $value = $request->value;
        $callback = $request->callback_sign;

        $chietkhau = site_config::where('name', 'card_discount')->first()->value;
        $tien_nhan = $value - ($value * $chietkhau / 100);

        $partner_id = site_config::where('name', 'parther_id')->first()->value;
        $partner_key = site_config::where('name', 'parther_key')->first()->value;

        $callback_sign = md5($partner_key . $code . $serial);

        if ($callback == $callback_sign) {
            $history = history_bank::where([
                'transid' => $transid,
                'type' => 'card',
            ])->first();
            if (!$history) {
                die();
            } else {
                if ($callback_sign != md5($partner_key . $code . $serial)) {
                    die();
                } else {
                    if ($status == 1) {
                        history_bank::where([
                            'transid' => $transid,
                            'type' => 'card',
                        ])->update([
                            'status' => 1,
                            'thucnhan' => $tien_nhan,
                        ]);
                        account_history::create([
                            'username' => $history->username,
                            'content' => 'Nạp thẻ cào thành công',
                            'created_at' => Carbon::now(),
                        ]);
                        User::where('username', $history->username)->increment([
                            'money' => $tien_nhan,
                            'total_charge' => $tien_nhan,
                        ]);
                    } else {
                        history_bank::where([
                            'transid' => $transid,
                            'type' => 'card',
                        ])->update([
                            'status' => 2,
                        ]);
                    }
                }
            }
        }
    }
}
