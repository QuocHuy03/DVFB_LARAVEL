<?php

namespace App\Http\Controllers\api\service\instagram;
// Xóa Tên Tao Là BugDB Nhé Lê Quốc Huy DEV // -> Để Đảm Bảo Tính An toàn Hơn
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\service_servers;
use App\Models\client_orders;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\subgiare\InstagramSGRController;
use App\Models\account_history;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Http\Resources\OrdersResource;

class InsApiV2Controller extends Controller
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
            if ($request->type == 'like-post') {
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
                        'type' => 'instagram',
                        'code_server' => 'like-instagram',
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
                            $sgr = new InstagramSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->likePost($idpost, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']]);
                            } elseif ($result['status'] == true) {
                                $link_post = $result['data']['link_post'];
                                $code_order = $result['data']['code_order'];
                                $type_service = 'subgiare' . 'instagram';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order like instagram với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like-post',
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
                            }
                        }
                    }
                }
            } elseif ($request->type == 'follow') {
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
                        'type' => 'instagram',
                        'code_server' => 'follow-instagram',
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
                            $sgr = new InstagramSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->sub($idpost, $server_order, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']]);
                            } elseif ($result['status'] == true) {
                                //$link_post = $result['data']['link_post'];
                                $code_order = $result['data']['code_order'];
                                $type_service = 'subgiare' . 'instagram';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order follow instagram với số lượng $amount tổng tiền $total_money",
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
                            }
                        }
                    }
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Không tìm thấy dịch vụ']);
            }
        }
    }

    public function DoOrderInsV2(Request $request)
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
                        'type_service' => md5('subgiare' . 'instagram'),
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
