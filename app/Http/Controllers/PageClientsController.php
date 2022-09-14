<?php

namespace App\Http\Controllers;

use App\Models\account_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\notice;
use App\Models\site_config;
use App\Models\sub_web;
use Illuminate\Support\Str;
use App\Models\client_orders;
use App\Models\history_bank;

class PageClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index()
    {
        $title = "Trang chủ";
        $tbday = site_config::where('name', 'thongbao')->first()->value;
        $orders = client_orders::where('username', Auth::user()->username)->count();
        $notice = notice::all();
        //Nạp tháng
        $month = history_bank::where('username', Auth::user()->username)->whereMonth('created_at', '=', Carbon::now()->month)->sum('thucnhan');
        return view('home', compact('title', 'tbday', 'notice', 'orders', 'month'));
    }

    public function profile()
    {
        $title = "Tài khoản của tôi";
        return view('pages.profile', compact('title'));
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pass_old' => 'required|string|',
            'pass_new' => 'required|string|min:6',
            'comfrim_pass' => 'required|string|same:pass_new',
        ], [
            'pass_old.required' => 'Mật khẩu cũ không được để trống',
            'pass_new.required' => 'Mật khẩu mới không được để trống',
            'comfrim_pass.required' => 'Xác nhận mật khẩu không được để trống',
            'pass_new.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'comfrim_pass.same' => 'Xác nhận mật khẩu không đúng',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $user = Auth::user();
            if (Hash::check($request->pass_old, $user->password)) {
                User::where('id', $user->id)->update(['password' => Hash::make($request->pass_new), 'updated_at' => Carbon::now()]);
                return response()->json([
                    'status' => true,
                    'message' => 'Thay đổi mật khẩu thành công',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Mật khẩu cũ không đúng',
                ]);
            }
        }
    }
    public function banking()
    {
        $title = "Nạp tiền ngân hàng";
        return view('recharge.banking', compact('title'));
    }

    public function card()
    {
        $title = "Nạp thẻ cào";
        return view('recharge.card', compact('title'));
    }

    public function create()
    {
        $title = "Tạo website riêng";
        $domain = sub_web::where('username', Auth::user()->username)->first();
        // kiểm tra xem có tồn tại domain này chưa nếu chưa thì để domain = new StrClass
        if (!$domain) {
            $domain = new \stdClass();
            $domain->domain = "";
        }

        return view('pages.domain', compact('title', 'domain'));
    }

    public function addDomain(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'domain' => 'required|string|unique:sub_webs,domain',
        ], [
            'domain.required' => 'Tên miền không được để trống',
            'domain.unique' => 'Tên miền đã tồn tại',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {

            $sub_web = sub_web::where('username', Auth::user()->username)->first();
            if (Auth::user()->level == 'member') {
                return response()->json([
                    'status' => false,
                    'message' => 'Cấp bậc của bọn phải bằng hoặc trên cộng tác viên mới được sử dụng tính năng này',
                ]);
            } elseif (sub_web::where('domain', $request->domain)->first()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tên miền đã tồn tại',
                ]);
            } elseif ($sub_web) {
                sub_web::where('username', Auth::user()->username)->update(['domain' => $request->domain, 'updated_at' => Carbon::now()]);
                return response()->json([
                    'status' => true,
                    'message' => 'Cập nhật thành công',
                ]);
            }
            $api_token = Str::random(70);
            $user = Auth::user();
            $domain = new sub_web();
            $domain->username = $user->username;
            $domain->api_token = $api_token;
            $domain->domain = $request->domain;
            $domain->status = 'Pending';
            $domain->save();
            return response()->json([
                'status' => true,
                'message' => 'Tạo tên miền thành công',
            ]);
        }
    }

    public function historys(Request $request)
    {
        $listHuycode = account_history::where('username', Auth::user()->username)
            ->get();
        return view('pages.profile', compact('listHuycode'));
    }


    public function apiDocument()
    {
        $title = "API Document";
        return view('pages.api-document', compact('title'));
    }
    public function capbac()
    {
        $title = "Cấp bậc";
        return view('pages.cap-bac', compact('title'));
    }
    public function site()
    {
        $title = "Site";
        return view('pages.site', compact('title'));
    }
}
