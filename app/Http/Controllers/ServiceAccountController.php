<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account_fb;
use App\Models\notice_accfbs;
use App\Models\User;
use App\Models\user_buy_accounts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ServiceAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index(Request $request)
    {
        $type = $request->type;
        switch ($type) {
            case 'buy':
                $title = 'Mua tài khoản';
                $acc = notice_accfbs::all();
                $clone = account_fb::where('type', 'clone')->get();
                $via = account_fb::where('type', 'via')->get();
                $tds = account_fb::where('type', 'tds')->get();
                $cloneSell = user_buy_accounts::where('type', 'clone')->get();
                $viaSell = user_buy_accounts::where('type', 'via')->get();
                $tdsSell = user_buy_accounts::where('type', 'tds')->get();
                $cloneLive = account_fb::where('type', 'clone')->where('status', 'LIVE')->get();
                $viaLive = account_fb::where('type', 'via')->where('status', 'LIVE')->get();
                $tdsLive = account_fb::where('type', 'tds')->where('status', 'LIVE')->get();
                $cloneDie = account_fb::where('type', 'clone')->where('status', 'DIE')->get();
                $viaDie = account_fb::where('type', 'via')->where('status', 'DIE')->get();
                $tdsDie = account_fb::where('type', 'tds')->where('status', 'DIE')->get();

                return view('service.accounts.buyAccount', compact('title', 'acc', 'clone', 'via', 'tds', 'cloneSell', 'viaSell', 'tdsSell', 'cloneLive', 'viaLive', 'tdsLive', 'cloneDie', 'viaDie', 'tdsDie'));
                break;
            case 'history':
                $title = 'Lịch sử mua tài khoản';
                $acc = notice_accfbs::all();
                $clone = account_fb::where(['type' => 'clone', 'username' => Auth::user()->username])->get();
                $via = account_fb::where(['type' => 'via', 'username' => Auth::user()->username])->get();
                $tds = account_fb::where(['type' => 'tds', 'username' => Auth::user()->username])->get();
                $cloneSell = user_buy_accounts::where(['type' => 'clone', 'username' => Auth::user()->username])->get();
                $viaSell = user_buy_accounts::where(['type' => 'via', 'username' => Auth::user()->username])->get();
                $tdsSell = user_buy_accounts::where(['type' => 'tds', 'username' => Auth::user()->username])->get();
                return view('service.accounts.hisAccount', compact('title', 'acc', 'clone', 'via', 'tds', 'cloneSell', 'viaSell', 'tdsSell'));
                break;
            default:
                abort(404);
                break;
        }
    }

    public function buy(Request $request)
    {
        $title = 'Mua tài khoản';
        $type = $request->type;
        if ($type == 'clone') {
            $type = 'clone';
            $acc = account_fb::where('type', 'clone')->get();
            return view('service.accounts.buy', compact('title', 'acc', 'type'));
        } elseif ($type == 'via') {
            $type = 'via';
            $acc = account_fb::where('type', 'via')->get();
            return view('service.accounts.buy', compact('title', 'acc', 'type'));
        } elseif ($type == 'tds') {
            $type = 'tds';
            $acc = account_fb::where('type', 'tds')->get();
            return view('service.accounts.buy', compact('title', 'acc', 'type'));
        } else {
            abort(404);
        }
    }

    public function DoAccount(Request $request)
    {
        $type = $request->type;
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
        }
        $clone = account_fb::where('type', $type)->get();
        $cloneBuy = $clone->sum('amount');

        $user = User::find(auth()->user()->id);
        if ($user->money < $request->amount) {
            return response()->json(['status' => false, 'message' => 'Bạn không đủ tiền để mua tài khoản']);
        } elseif ($clone->count() < 0) {
            return response()->json(['status' => false, 'message' => 'Đã hết tài khoản']);
        }
        $user->money = $user->money - $request->amount;
        $user->save();
        for ($i = 0; $i < $request->amount; $i++) {
            user_buy_accounts::create([
                'type' => $type,
                'username' => $user->username,
                'uid' => $clone[$i]->uid,
                'pass' => $clone[$i]->pass,
                'twofa' => $clone[$i]->twofa,
                'cookie' => $clone[$i]->cookie,
                'token' => $clone[$i]->token,
                'mail' => $clone[$i]->mail,
                'passMail' => $clone[$i]->passMail,
            ]);
            account_fb::destroy($clone[$i]->id);
        }
        return response()->json(['status' => true, 'message' => 'Mua tài khoản thành công']);
    }
}
