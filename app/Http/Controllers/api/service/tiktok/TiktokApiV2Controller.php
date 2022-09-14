<?php

namespace App\Http\Controllers\api\service\tiktok;
// Xóa Tên Tao Là BugDB Nhé Lê Quốc Huy DEV // -> Để Đảm Bảo Tính An toàn Hơn
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\subgiare\TikTokSGRController;
use App\Models\User;
use App\Models\account_history;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\service_servers;
use App\Models\client_orders;
use Illuminate\Support\Str;
use App\Http\Resources\OrdersResource;

class TiktokApiV2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index(Request $request)
    {
        $Api_token = $request->header('Api-Token');
        $id_order = Str::random(10);
        if (empty($Api_token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Api-token phải bắt buộc'
            ], 200);
        } else {
            $user = User::where('api_token', $Api_token)->first();
            if (empty($user)) {
                return response()->json(['status' => false, 'message' => 'Api-token người dùng không tồn tại']);
            }
            if ($request->type == 'like') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
                } else {
                    $server = service_servers::where([
                        'type' => 'tiktok',
                        'code_server' => 'tym-tiktok',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (empty($server)) {
                        return response()->json(['status' => false, 'message' => 'Mã server không tồn tại']);
                    } elseif ($server->status == 'off') {
                        return response()->json(['status' => false, 'message' => 'Mã server đang tạm ngưng']);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền để thực hiện giao dịch']);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new TikTokSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $data = $sgr->like($idpost, $server_order, $amount, $note);
                            if ($data['status'] == false) {
                                return response()->json(['status' => false, 'message' => $data['message']]);
                            } elseif ($data['status'] == true) {
                                $code_order = $data['data']['code_order'];
                                $type_service = 'subgiare' . 'tiktok';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order tym tiktok với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idpost,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'id_order' => $id_order,
                                    'ghichu' => $note,
                                    'type_service' => md5($type_service),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => true, 'message' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            } else {
                                return response()->json(['status' => false, 'message' => 'Lỗi không xác định']);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'comment') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'comment' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
                } else {
                    $server = service_servers::where([
                        'type' => 'tiktok',
                        'code_server' => 'comment-tiktok',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (empty($server)) {
                        return response()->json(['status' => false, 'message' => 'Mã server không tồn tại']);
                    } elseif ($server->status == 'off') {
                        return response()->json(['status' => false, 'message' => 'Mã server đang tạm ngưng']);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền để thực hiện giao dịch']);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new TikTokSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $comment = $request->comment;
                            $amount = $request->amount;
                            $note = $request->note;
                            $data = $sgr->comment($idpost, $server_order, $comment, $amount, $note);
                            if ($data['status'] == false) {
                                return response()->json(['status' => false, 'message' => $data['message']]);
                            } elseif ($data['status'] == true) {
                                $code_order = $data['data']['code_order'];

                                $type_service = 'subgiare' . 'tiktok';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order cmt tiktok với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'comment',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idpost,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'id_order' => $id_order,
                                    'ghichu' => $note,
                                    'type_service' => md5($type_service),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => true, 'message' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            } else {
                                return response()->json(['status' => false, 'message' => 'Lỗi không xác định']);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'share') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
                } else {
                    $server = service_servers::where([
                        'type' => 'tiktok',
                        'code_server' => 'share-tiktok',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (empty($server)) {
                        return response()->json(['status' => false, 'message' => 'Mã server không tồn tại']);
                    } elseif ($server->status == 'off') {
                        return response()->json(['status' => false, 'message' => 'Mã server đang tạm ngưng']);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền để thực hiện giao dịch']);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new TikTokSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $data = $sgr->share($idpost, $server_order, $amount, $note);
                            if ($data['status'] == false) {
                                return response()->json(['status' => false, 'message' => $data['message']]);
                            } elseif ($data['status'] == true) {
                                $code_order = $data['data']['code_order'];
                                $type_service = 'subgiare' . 'tiktok';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order share tiktok với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'share',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idpost,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'id_order' => $id_order,
                                    'ghichu' => $note,
                                    'type_service' => md5($type_service),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => true, 'message' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            } else {
                                return response()->json(['status' => false, 'message' => 'Lỗi không xác định']);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'sub') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
                } else {
                    $server = service_servers::where([
                        'type' => 'tiktok',
                        'code_server' => 'sub-tiktok',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (empty($server)) {
                        return response()->json(['status' => false, 'message' => 'Mã server không tồn tại']);
                    } elseif ($server->status == 'off') {
                        return response()->json(['status' => false, 'message' => 'Mã server đang tạm ngưng']);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền để thực hiện giao dịch']);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new TikTokSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $data = $sgr->sub($idpost, $server_order, $amount, $note);
                            if ($data['status'] == false) {
                                return response()->json(['status' => false, 'message' => $data['message']]);
                            } elseif ($data['status'] == true) {
                                $code_order = $data['data']['code_order'];

                                $type_service = 'subgiare' . 'tiktok';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order sub tiktok với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'sub',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idpost,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'id_order' => $id_order,
                                    'ghichu' => $note,
                                    'type_service' => md5($type_service),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => true, 'message' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            } else {
                                return response()->json(['status' => false, 'message' => 'Lỗi không xác định']);
                            }
                        }
                    }
                }
            } elseif ($request->type == 'view') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
                } else {
                    $server = service_servers::where([
                        'type' => 'tiktok',
                        'code_server' => 'view-tiktok',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (empty($server)) {
                        return response()->json(['status' => false, 'message' => 'Mã server không tồn tại']);
                    } elseif ($server->status == 'off') {
                        return response()->json(['status' => false, 'message' => 'Mã server đang tạm ngưng']);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền để thực hiện giao dịch']);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new TikTokSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $data = $sgr->view($idpost, $server_order, $amount, $note);
                            if ($data['status'] == false) {
                                return response()->json(['status' => false, 'message' => $data['message']]);
                            } elseif ($data['status'] == true) {
                                $code_order = $data['data']['code_order'];

                                $type_service = 'subgiare' . 'tiktok';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order view tiktok với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'view',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idpost,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'id_order' => $id_order,
                                    'ghichu' => $note,
                                    'type_service' => md5($type_service),
                                    'created_at' => Carbon::now(),
                                ]);
                                return response()->json(['status' => true, 'message' => "Đã mua đơn hàng này thành công", "code_order" => $id_order], 200);
                            } else {
                                return response()->json(['status' => false, 'message' => 'Lỗi không xác định']);
                            }
                        }
                    }
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Không tìm thấy dịch vụ']);
            }
        }
    }
    public function DoOrderTiktokV2(Request $request)
    {
        $Api_token = $request->header('Api-Token');
        if (empty($Api_token)) {
            return response()->json([
                'staus' => false,
                'message' => 'Api-Token phải bắt buộc'
            ], 201);
        } else {
            $user = User::where('api_token', $Api_token)->first();
            if (empty($user)) {
                return response()->json(['status' => false, 'message' => 'Api-Token này không tồn tại'], 201);
            } else {
                $validator = Validator::make($request->all(), [
                    'code_order' => 'required|string',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $order = client_orders::where([
                        'id_order' => $request->code_order,
                        'username' => $user->username,
                        'type_service' => md5('subgiare' . 'tiktok'),
                    ])->first();
                    if (!$order) {
                        return response()->json(['status' => false, 'message' => 'Không tìm thấy đơn hàng này'], 201);
                    } else {
                        return new OrdersResource($order);
                    }
                }
            }
        }
    }
}
