<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\site_config;
use App\Models\service_servers;
use App\Models\account_fb;
use App\Models\user_buy_accounts;
use App\Models\notice_accfbs;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index(Request $request)
    {
        if ($request->type == 'facebook') {
            $title = 'Facebook';
            $sgr = site_config::where('name', 'subgiare')->first()->value;
            $baostart = site_config::where('name', 'baostar')->first()->value;
            //list 
            $BaoStar = service_servers::where([['type', '=', 'facebook'], ['api_server', '=', 'baostar'],])->get();
            $SubGiare = service_servers::where([['type', '=', 'facebook'], ['api_server', '=', 'subgiare'],])->get();
            return view('admin.services.facebook', compact('title', 'sgr', 'baostart', 'BaoStar', 'SubGiare'));
        } elseif ($request->type == 'instagram') {
            $title = 'Instagram';
            $BaoStar = service_servers::where([['type', '=', 'instagram'], ['api_server', '=', 'baostar'],])->get();
            $SubGiare = service_servers::where([['type', '=', 'instagram'], ['api_server', '=', 'subgiare'],])->get();
            return view('admin.services.instagram', compact('title', 'BaoStar', 'SubGiare'));
        } elseif ($request->type == 'tiktok') {
            $title = 'Tiktok';
            $BaoStar = service_servers::where([['type', '=', 'tiktok'], ['api_server', '=', 'baostar'],])->get();
            $SubGiare = service_servers::where([['type', '=', 'tiktok'], ['api_server', '=', 'subgiare'],])->get();
            return view('admin.services.tiktok', compact('title', 'BaoStar', 'SubGiare'));
        }
    }
    public function update(Request $request)
    {
        if ($request->type == 'facebook') {
            $validator = Validator::make($request->all(), [
                'subgiare' => 'required',
                'baostar' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
            } else {
                if ($request->subgiare == 'show') {
                    site_config::where('name', 'subgiare')->update(['value' => 'show']);
                } else {
                    site_config::where('name', 'subgiare')->update(['value' => 'hide']);
                }
                if ($request->baostar == 'show') {
                    site_config::where('name', 'baostar')->update(['value' => 'show']);
                } else {
                    site_config::where('name', 'baostar')->update(['value' => 'hide']);
                }
                return response()->json(['status' => true, 'message' => 'Cập nhật thành công',], 200);
            }
        }
    }



    public function add(Request $request)
    {
        if ($request->type == 'facebook') {

            if ($request->server_type == 'subgiare') {
                $validator = Validator::make($request->all(), [
                    'server_service' => 'required',
                    'type_service' => 'required',
                    'rate_service' => 'required|numeric',
                    'title_service' => 'required',
                    'notice' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
                } else {
                    $check = service_servers::where([
                        'code_server' => $request->type_service,
                        'server_service' => $request->server_service,
                        'api_server' => 'subgiare',
                    ])->first();
                    if ($check) {
                        return response()->json(['status' => false, 'message' => 'Dịch vụ đã tồn tại',], 200);
                    } else {
                        $data = [
                            'type' => 'facebook',
                            'code_server' => $request->type_service,
                            'server_service' => $request->server_service,
                            'rate_server' => $request->rate_service,
                            'title_server' => $request->title_service,
                            'content_server' => $request->notice,
                            'status_server' => 'on',
                            'api_server' => 'subgiare',
                        ];
                        service_servers::create($data);
                        return response()->json(['status' => true, 'message' => 'Thêm thành công',], 200);
                    }
                }
            } elseif ($request->server_type == 'baostar') {
                $validator = Validator::make($request->all(), [
                    'server_service' => 'required',
                    'type_service' => 'required',
                    'name_sv'   => 'required',
                    'rate_service' => 'required|numeric',
                    'title_service' => 'required',
                    'notice' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
                } else {
                    //check server_service exist type_service
                    $check = service_servers::where([
                        'code_server' => $request->type_service,
                        'server_service' => $request->server_service,
                        'api_server' => 'baostar',
                    ])->first();
                    $checkNameSV = service_servers::where([
                        'name_server' => $request->name_sv,
                        'api_server' => 'baostar',
                    ])->first();
                    if ($check) {
                        return response()->json(['status' => false, 'message' => 'Dịch vụ đã tồn tại',], 200);
                    }
                    if ($checkNameSV) {
                        return response()->json(['status' => false, 'message' => 'name_server đã tồn tại',], 200);
                    } else {
                        $data = [
                            'type' => 'facebook',
                            'code_server' => $request->type_service,
                            'name_server' => $request->name_sv,
                            'server_service' => $request->server_service,
                            'rate_server' => $request->rate_service,
                            'title_server' => $request->title_service,
                            'content_server' => $request->notice,
                            'status_server' => 'on',
                            'api_server' => 'baostar',
                        ];
                        service_servers::create($data);
                        return response()->json(['status' => true, 'message' => 'Thêm thành công',], 200);
                    }
                }
            }
        } elseif ($request->type == 'instagram') {
            if ($request->server_type == 'subgiare') {
                $validator = Validator::make($request->all(), [
                    'server_service' => 'required',
                    'type_service' => 'required',
                    'rate_service' => 'required|numeric',
                    'title_service' => 'required',
                    'notice' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
                } else {
                    $check = service_servers::where([
                        'code_server' => $request->type_service,
                        'server_service' => $request->server_service,
                        'api_server' => 'subgiare',
                    ])->first();
                    if ($check) {
                        return response()->json(['status' => false, 'message' => 'Dịch vụ đã tồn tại',], 200);
                    } else {
                        $data = [
                            'type' => 'instagram',
                            'code_server' => $request->type_service,
                            'server_service' => $request->server_service,
                            'rate_server' => $request->rate_service,
                            'title_server' => $request->title_service,
                            'content_server' => $request->notice,
                            'status_server' => 'on',
                            'api_server' => 'subgiare',
                        ];
                        service_servers::create($data);
                        return response()->json(['status' => true, 'message' => 'Thêm thành công',], 200);
                    }
                }
            } elseif ($request->server_type == 'baostar') {
                $validator = Validator::make($request->all(), [
                    'server_service' => 'required',
                    'type_service' => 'required',
                    'name_sv'   => 'required',
                    'rate_service' => 'required|numeric',
                    'title_service' => 'required',
                    'notice' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
                } else {
                    //check server_service exist type_service
                    $check = service_servers::where([
                        'code_server' => $request->type_service,
                        'server_service' => $request->server_service,
                        'api_server' => 'baostar',
                    ])->first();
                    $checkNameSV = service_servers::where([
                        'name_server' => $request->name_sv,
                        'api_server' => 'baostar',
                    ])->first();
                    if ($check) {
                        return response()->json(['status' => false, 'message' => 'Dịch vụ đã tồn tại',], 200);
                    }
                    if ($checkNameSV) {
                        return response()->json(['status' => false, 'message' => 'name_server đã tồn tại',], 200);
                    } else {
                        $data = [
                            'type' => 'instagram',
                            'code_server' => $request->type_service,
                            'name_server' => $request->name_sv,
                            'server_service' => $request->server_service,
                            'rate_server' => $request->rate_service,
                            'title_server' => $request->title_service,
                            'content_server' => $request->notice,
                            'status_server' => 'on',
                            'api_server' => 'baostar',
                        ];
                        service_servers::create($data);
                        return response()->json(['status' => true, 'message' => 'Thêm thành công',], 200);
                    }
                }
            }
        } elseif ($request->type == 'tiktok') {
            if ($request->server_type == 'subgiare') {
                $validator = Validator::make($request->all(), [
                    'server_service' => 'required',
                    'type_service' => 'required',
                    'rate_service' => 'required|numeric',
                    'title_service' => 'required',
                    'notice' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
                } else {
                    $check = service_servers::where([
                        'code_server' => $request->type_service,
                        'server_service' => $request->server_service,
                        'api_server' => 'subgiare',
                    ])->first();
                    if ($check) {
                        return response()->json(['status' => false, 'message' => 'Dịch vụ đã tồn tại',], 200);
                    } else {
                        $data = [
                            'type' => 'tiktok',
                            'code_server' => $request->type_service,
                            'server_service' => $request->server_service,
                            'rate_server' => $request->rate_service,
                            'title_server' => $request->title_service,
                            'content_server' => $request->notice,
                            'status_server' => 'on',
                            'api_server' => 'subgiare',
                        ];
                        service_servers::create($data);
                        return response()->json(['status' => true, 'message' => 'Thêm thành công',], 200);
                    }
                }
            } elseif ($request->server_type == 'baostar') {
                $validator = Validator::make($request->all(), [
                    'server_service' => 'required',
                    'type_service' => 'required',
                    'name_sv'   => 'required',
                    'rate_service' => 'required|numeric',
                    'title_service' => 'required',
                    'notice' => 'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
                } else {
                    //check server_service exist type_service
                    $check = service_servers::where([
                        'code_server' => $request->type_service,
                        'server_service' => $request->server_service,
                        'api_server' => 'baostar',
                    ])->first();
                    $checkNameSV = service_servers::where([
                        'name_server' => $request->name_sv,
                        'api_server' => 'baostar',
                    ])->first();
                    if ($check) {
                        return response()->json(['status' => false, 'message' => 'Dịch vụ đã tồn tại',], 200);
                    }
                    if ($checkNameSV) {
                        return response()->json(['status' => false, 'message' => 'name_server đã tồn tại',], 200);
                    } else {
                        $data = [
                            'type' => 'tiktok',
                            'code_server' => $request->type_service,
                            'name_server' => $request->name_sv,
                            'server_service' => $request->server_service,
                            'rate_server' => $request->rate_service,
                            'title_server' => $request->title_service,
                            'content_server' => $request->notice,
                            'status_server' => 'on',
                            'api_server' => 'baostar',
                        ];
                        service_servers::create($data);
                        return response()->json(['status' => true, 'message' => 'Thêm thành công',], 200);
                    }
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy loại dịch vụ này',], 200);
        }
    }

    public function edit(Request $request)
    {
        $title = 'Sửa dịch vụ';
        $id = $request->id;
        $service = service_servers::find($id);
        return view('admin.services.edit', compact('title', 'service'));
    }

    public function updateSV(Request $request)
    {
        $server = service_servers::find($request->id);
        $validator = Validator::make($request->all(), [
            'rate_sv' => 'required|numeric',
            'title_sv' => 'required',
            'notice' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
        } else {
            $server->rate_server = $request->rate_sv;
            if ($server->api_server == 'baostar') {
                $server->name_server = $request->name_sv;
            }
            $server->title_server = $request->title_sv;
            $server->content_server = $request->notice;
            $server->save();
            return response()->json(['status' => true, 'message' => 'Cập nhật thành công',], 200);
        }
    }
    public function status(Request $request)
    {
        $server = service_servers::find($request->id);
        if ($server) {
            if ($server->status_server == 'on') {
                $server->status_server = 'off';
            } else {
                $server->status_server = 'on';
            }
            $server->save();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    public function delete(Request $request)
    {
        $server = service_servers::find($request->id);
        if ($server) {
            $server->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }

    public function autoService()
    {
        $title = 'Dịch vụ tự động';
        $sgr = site_config::where('name', 'subgiare')->first();
        $baostart = site_config::where('name', 'baostar')->first();
        return view('admin.services.autoService', compact('title', 'sgr', 'baostart'));
    }

    public function accountOrders()
    {
        $title = "Đơn hàng mua tài khoản";
        $type = notice_accfbs::all();
        $orders = user_buy_accounts::orderBy('id', 'desc')->get();
        $clone = account_fb::where('type', 'clone')->get();
        $via = account_fb::where('type', 'via')->get();
        $tds = account_fb::where('type', 'tds')->get();
        return view('admin.pages.accountOrders', compact('title', 'orders', 'type', 'clone', 'via', 'tds'));
    }

    public function DoAccountOrders(Request $requets)
    {
        $validator = Validator::make($requets->all(), [
            'type_account' => 'required',
            'list_account' => 'required',
            'notice' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
        } else {
            $list_acc = explode(PHP_EOL, $requets->list_account);
            foreach ($list_acc as $acc) {
                $data = [
                    'type' => $requets->type_account,
                    'acc' => $acc,
                    'status' => 'LIVE',
                    'notice' => $requets->notice,
                ];
                $check = account_fb::where('acc', $acc)->first();
                if ($check) {
                    continue;
                }
                account_fb::create($data);
            }
            return response()->json(['status' => true, 'message' => "Thành công",], 200);
        }
    }

    public function DoAccountType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'ghichu' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),], 200);
        } else {
            $account = notice_accfbs::where('type', $request->type)->first();
            if ($account) {
                $account->price = $request->amount;
                $account->content = $request->ghichu;
                $account->save();
                return response()->json(['status' => true, 'message' => "Thành công",], 200);
            } else {
                return response()->json(['status' => false, 'message' => "Tài khoản không tồn tại",], 200);
            }
        }
    }
}
