<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\site_config;
use App\Models\notice;
use App\Http\Controllers\api\domain\CloudflareController;
use App\Models\client_orders;
use App\Models\sub_web;
use App\Models\account_banks;
use App\Models\history_bank;
use Carbon\Carbon;
use App\Models\block_ips;

class PageAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index()
    {
        $title = "Trang quản trị";
        $orders = client_orders::where('created_at', '>=', Carbon::now()->startOfDay())->count();
        $users = User::where('level', '!=', 'admin')->count();
        $users_today = User::where('level', '!=', 'admin')->where('created_at', '>=', Carbon::now()->startOfDay())->count();
        $orders_run = client_orders::where('status', '=', 'Start')->count();
        $orders_success = client_orders::where('status', '=', 'Success')->count();
        $total_recharge = history_bank::where('created_at', '>=', Carbon::now()->startOfDay())->sum('thucnhan');
        return view('admin.home', compact('title', 'orders', 'users', 'users_today', 'orders_run', 'orders_success', 'total_recharge'));
    }

    public function clients()
    {
        $title = "Danh sách khách hàng";
        $users = User::all();
        return view('admin.pages.manageUser', compact('title', 'users'));
    }

    public function editClient(Request $request)
    {
        $title = "Chỉnh sửa thông tin khách hàng";
        $user = User::find($request->id);
        return view('admin.pages.editUser', compact('title', 'user'));
    }

    public function DoEditClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'type' => 'required',
            'banned' => 'required',
            'money' => 'required|numeric',
        ], [
            'id.required' => 'ID không được để trống',
            'type.required' => 'Loại tài khoản không được để trống',
            'banned.required' => 'Trạng thái không được để trống',
            'money.required' => 'Số tiền không được để trống',
            'money.numeric' => 'Số tiền phải là số',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            if ($request->type == 'congtien') {
                $user = User::find($request->id);
                $user->money += $request->money;
                $user->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Cộng tiền thành công',
                ]);
            } elseif ($request->type == 'trutien') {
                $user = User::find($request->id);
                $user->money -= $request->money;
                $user->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Trừ tiền thành công',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Lỗi',
                ]);
            }
        }
        return redirect()->route('admin.clients');
    }

    public function deleteClient(Request $request)
    {
        $user = User::find($request->id);
        //check $user exist
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy thành viên');
        }
    }
    public function notice()
    {
        $title = "Cài đặt thông báo";
        $notice = site_config::where('name', 'thongbao')->first()->value;
        $list_notice = notice::all();
        return view('admin.pages.notice', compact('title', 'notice', 'list_notice'));
    }

    public function updateNotice(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'noticeHome' => 'required|string',
        ], [
            'noticeHome.required' => 'Thông báo không được để trống',
            'noticeHome.string' => 'Thông báo phải là chuỗi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            site_config::where('name', 'thongbao')->update([
                'value' => $request->noticeHome,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
            ]);
        }
    }

    public function addNotice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
        ], [
            'content.required' => 'Nội dung không được để trống',
            'content.string' => 'Nội dung phải là chuỗi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            notice::create([
                'username' => Auth::user()->username,
                'content' => $request->content,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Thêm thành công',
            ]);
        }
    }
    public function deleteNotice(Request $request)
    {
        $notice = notice::find($request->id);
        if ($notice) {
            $notice->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy thông báo');
        }
    }

    public function configWebsite()
    {
        $title = "Cấu hình website";
        return view('admin.pages.configWeb', compact('title'));
    }

    public function DoConfigWebsite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'domain' => 'required|string',
            'logoWeb' => 'required|string',
            'favicon' => 'required|string',
            'api_tele' => 'required|string',
            'id_chat' => 'required|numeric',
            'mucnapCTV' => 'required|numeric',
            'mucnapDL' => 'required|numeric',
            'mucnapNPP' => 'required|numeric',
            'discount_TV' => 'required|numeric',
            'discount_CTV' => 'required|numeric',
            'discount_DL' => 'required|numeric',
            'discount_NPP' => 'required|numeric',
            'card_discount' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            site_config::where('name', 'domain')->update([
                'value' => $request->domain,
            ]);
            site_config::where('name', 'logo')->update([
                'value' => $request->logoWeb,
            ]);
            site_config::where('name', 'favicon')->update([
                'value' => $request->favicon,
            ]);
            site_config::where('name', 'api_tele')->update([
                'value' => $request->api_tele,
            ]);
            site_config::where('name', 'id_chat_tele')->update([
                'value' => $request->id_chat,
            ]);
            site_config::where('name', 'charge_level_CTV')->update([
                'value' => $request->mucnapCTV,
            ]);
            site_config::where('name', 'charge_level_DL')->update([
                'value' => $request->mucnapDL,
            ]);
            site_config::where('name', 'charge_level_NPP')->update([
                'value' => $request->mucnapNPP,
            ]);
            site_config::where('name', 'discount_TV')->update([
                'value' => $request->discount_TV,
            ]);
            site_config::where('name', 'discount_CTV')->update([
                'value' => $request->discount_CTV,
            ]);
            site_config::where('name', 'discount_DL')->update([
                'value' => $request->discount_DL,
            ]);
            site_config::where('name', 'discount_NPP')->update([
                'value' => $request->discount_NPP,
            ]);
            site_config::where('name', 'card_discount')->update([
                'value' => $request->card_discount,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
            ]);
        }
    }

    public function settingAdmin()
    {
        $title = "Cấu hình quản trị";
        return view('admin.pages.settingAdmin', compact('title'));
    }

    public function DoSettingAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_admin' => 'required|string',
            'link_fb' => 'required|string',
            'link_zalo' => 'required|string',
            'token_subgiare' => 'required|string',
            'token_baostar' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            site_config::where('name', 'admin_name')->update([
                'value' => $request->name_admin,
            ]);
            site_config::where('name', 'facebook_admin')->update([
                'value' => $request->link_fb,
            ]);
            site_config::where('name', 'zalo_admin')->update([
                'value' => $request->link_zalo,
            ]);
            site_config::where('name', 'token_subgiare')->update([
                'value' => $request->token_subgiare,
            ]);
            site_config::where('name', 'token_baostar')->update([
                'value' => $request->token_baostar,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
            ]);
        }
    }

    public function subdomain()
    {
        $title = "Quản lí web con";
        $subdomain = sub_web::all();
        return view('admin.pages.subdomain', compact('title', 'subdomain'));
    }

    public function clientOrders()
    {
        $title = "Đơn hàng của khách hàng";
        $order = client_orders::all();
        return view('admin.pages.clientOrders', compact('title', 'order'));
    }

    public function recharge()
    {
        $title = "Quản lí ngân hàng";
        $account = account_banks::all();
        return view('admin.pages.recharge', compact('title', 'account'));
    }

    public function DoRecharge(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_bank' => 'required|string',
            'bank_name' => 'required|string',
            'logo_bank' => 'required|string',
            'token' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|numeric',
            'password' => 'required|string',
            'min_bank' => 'required|numeric',
            'notice' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $account = account_banks::where([
                'bank_name' => $request->bank_name,
            ])->first();
            if ($account) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tài khoản đã tồn tại',
                ]);
            } else {
                account_banks::create([
                    'type' => $request->type_bank,
                    'username' => Auth::user()->username,
                    'account_name' => $request->account_name,
                    'account_number' => $request->account_number,
                    'password' => $request->password,
                    'bank_name' => $request->bank_name,
                    'logo' => $request->logo_bank,
                    'min_bank' => $request->min_bank,
                    'notice' => $request->notice,
                    'token' => $request->token,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Thêm thành công',
                ]);
            }
        }
    }
    public function editRecharge(Request $request)
    {
        $title = "Chỉnh sửa ngân hàng";
        $account = account_banks::where('id', $request->id)->first();
        if (empty($account)) {
            return redirect()->back()->with('error', 'Không tìm thấy ngân hàng');
        }
        return view('admin.pages.editRecharge', compact('title', 'account'));
    }
    public function DoEditRecharge(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_name' => 'required|string',
            'account_number' => 'required|numeric',
            'password' => 'required|string',
            'min_bank' => 'required|numeric',
            'notice' => 'required|string',
            'token' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $account = account_banks::where([
                'id' => $request->id,
                'account_number' => $request->account_number,
            ])->first();
            if (!$account) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tài khoản không tồn tại',
                ]);
            } else {
                account_banks::where('id', $request->id)->update([
                    'username' => Auth::user()->username,
                    'account_name' => $request->account_name,
                    'account_number' => $request->account_number,
                    'password' => $request->password,
                    'min_bank' => $request->min_bank,
                    'notice' => $request->notice,
                    'token' => $request->token,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Chỉnh sửa thành công',
                ]);
            }
        }
    }

    public function deleteRecharge(Request $request)
    {
        $dele = account_banks::where('id', $request->id)->delete();
        if ($dele) {
            return back()->with('success', 'Xóa thành công');
        } else {
            return back()->with('error', 'Xóa thất bại');
        }
    }

    public function rechargeCard()
    {
        $title = "Quản lí nạp thẻ cào";
        $cardType = site_config::where('name', 'card_type')->first()->value;
        return view('admin.pages.rechargeCard', compact('title', 'cardType'));
    }

    public function DoRechargeCard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameWeb' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } elseif ($request->nameWeb == 'ttvpay') {
            $validator = Validator::make($request->all(), [
                'apiKey' => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()->first(),
                ]);
            } else {
                site_config::where('name', 'card_type')->update([
                    'value' => $request->nameWeb,
                ]);
                site_config::where('name', 'parther_key')->update([
                    'value' => $request->apiKey,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Thay đổi thành công',
                ]);
            }
        } elseif ($request->nameWeb == 'thesieure') {
            $validator = Validator::make($request->all(), [
                'parther_id' => 'required|numeric',
                'parther_key' => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()->first(),
                ]);
            } else {
                site_config::where('name', 'card_type')->update([
                    'value' => $request->nameWeb,
                ]);
                site_config::where('name', 'parther_id')->update([
                    'value' => $request->parther_id,
                ]);
                site_config::where('name', 'parther_key')->update([
                    'value' => $request->parther_key,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Thay đổi thành công',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy web thẻ cào này',
            ]);
        }
    }

    public function managerBank()
    {
        $title = "Quản lí nạp tiền";
        $bank = history_bank::all();
        return view('admin.pages.managerBank', compact('title', 'bank'));
    }

    public function transferCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transfer_code' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            site_config::where('name', 'transfer_code')->update([
                'value' => $request->transfer_code,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Thay đổi thành công',
            ]);
        }
    }

    public function blockIp()
    {
        $title = "Chặn ip người dùng";
        $ip = block_ips::all();
        return view('admin.pages.blockIp', compact('title', 'ip'));
    }

    public function DoBlockIp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blockIp' => 'required|string',
            'reason' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $ip = block_ips::where('ip', $request->blockIp)->first();
            if ($ip) {
                return response()->json([
                    'status' => false,
                    'message' => 'Địa chỉ ip đã tồn tại',
                ]);
            } else {
                block_ips::create([
                    'ip' => $request->blockIp,
                    'reason' => $request->reason,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Thêm thành công',
                ]);
            }
        }
    }
    public function deleteBlockIp(Request $request)
    {
        $dele = block_ips::where('id', $request->id)->delete();
        if ($dele) {
            return back()->with('success', 'Xóa thành công');
        } else {
            return back()->with('error', 'Xóa thất bại');
        }
    }
}
