<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('auth.login');
    }

    public function DoLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Nhập tên đăng nhập của bạn',
            'password.required' => 'Nhập mật khẩu của bạn',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        } else {
            $user = User::where('username', $request->username)->first();
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                if ($user->banned >= 1) {
                    return redirect()->back()->with('error', 'Tài khoản của bạn đang bị khóa');
                } elseif (!$user) {
                    return redirect()->back()->with('error', 'Tên đăng nhập không tồn tại');
                } else {
                    Auth::login($user);
                    return redirect()->route('home');
                }
            } else {
                return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
            }
        }
    }

    public function DoRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:6|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'number' => 'required|string|min:10|max:10|unique:users',
            'fb_id' => 'required|string|unique:users',
            'password_confirmation' => 'required|string|min:6|same:password',

        ], [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'number.required' => 'Vui lòng nhập số điện thoại',
            'number.unique' => 'Số điện thoại đã tồn tại',
            'fb_id.required' => 'Vui lòng nhập facebook id',
            'fb_id.unique' => 'Facebook id đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
            'password_confirmation.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        } else {
            $api_token = Str::random(60);
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'number' => $request->number,
                'fb_id' => $request->fb_id,
                'password' => Hash::make($request->password),
                'level' => 'member',
                'money' => '0',
                'total_charge' => '0',
                'total_minus' => '0',
                'banned' => '0',
                'ip' => $request->ip(),
                'api_token' => $api_token,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if ($user) {
                return redirect()->route('auth.login')->with('success', 'Đăng ký thành công');
                // return response()->json(['status' => 'success', 'message' => 'Đăng ký thành công']);
            } else {
                return redirect()->back()->with('error', 'Đăng ký thất bại')->withInput();
            }
        }
    }
}
