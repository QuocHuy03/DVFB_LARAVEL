<?php

namespace App\Http\Controllers\api\service\facebook;
// Xóa Tên Tao Là BugDB Nhé Lê Quốc Huy DEV // -> Để Đảm Bảo Tính An toàn Hơn
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\site_config;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\service_servers;
use App\Models\account_history;
use App\Http\Controllers\api\subgiare\FacebookSGRController;
use App\Models\client_orders;
use Illuminate\Support\Str;
use App\Http\Resources\OrdersResource;


class ApiV2Controller extends Controller
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
                'staus' => false,
                'message' => 'Api-Token phải bắt buộc'
            ], 201);
        } else {
            $user = User::where('api_token', $Api_token)->first();
            if (empty($user)) {
                return response()->json(['status' => false, 'message' => 'Api-Token này không tồn tại'], 201);
            }
            if ($request->type == 'like-sale') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'reaction' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'like-post-sale',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $reaction = $request->reaction;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->likePostSale($idpost, $server_order, $reaction, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $link_post = $result['data']['link_post'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];
                                $type_service = 'subgiare' . 'facebook';
                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();
                                // Phần In Ra Lịch Sử Tài Khoản Lê Quốc Huy Coder //
                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order like sale với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);
                                // lịch sử order
                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like-post-sale',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $link_post,
                                    'server_order' => $server_order,
                                    'interactive' => $reaction,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
            } elseif ($request->type == 'like-speed') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'reaction' => 'required|string',
                    'speed' => 'required',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'like-post-speed',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $reaction = $request->reaction;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->likePostSpeed($idpost, $server_order, $reaction, $request->speed, $amount, $note);
                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $link_post = $result['data']['idpost'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order like speed với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like-post-speed',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $link_post,
                                    'server_order' => $server_order,
                                    'interactive' => $reaction,
                                    'type_order' => $request->speed,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
            } elseif ($request->type == 'like-comment') {
                $validator = Validator::make($request->all(), [
                    'idcomment' => 'required|numeric',
                    'server_order' => 'required|string',
                    'reaction' => 'required|string',
                    'speed' => 'required',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'like-comment',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idcomment = $request->idcomment;
                            $server_order = $request->server_order;
                            $reaction = $request->reaction;
                            $speed = $request->speed;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->like_comment($idcomment, $server_order, $reaction, $speed, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $link_post = $result['data']['idcomment'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order like comment với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like-comment',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $link_post,
                                    'server_order' => $server_order,
                                    'interactive' => $reaction,
                                    'type_order' => $request->speed,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'comment-sale') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'comment' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'comment-sale',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $comment = $request->comment;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->commentSale($idpost, $server_order, $comment, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $link_post = $result['data']['link_post'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order comment sale với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'comment-sale',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $link_post,
                                    'server_order' => $server_order,
                                    'interactive' => $comment,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
            } elseif ($request->type == 'sub-vip') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'sub-vip',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->subVip($idpost, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idfb'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order sub vip với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'sub-vip',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
            } elseif ($request->type == 'sub-quality') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'sub-quality',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->subQuality($idpost, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idfb'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order sub quality với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'sub-quality',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'sub-sale') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'sub-sale',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->subSale($idpost, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idfb'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order sub sale với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'sub-sale',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'sub-speed') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'sub-speed',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->subSpeed($idpost, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idfb'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order sub speed với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'sub-speed',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'like-page-quality') {
                $validator = Validator::make($request->all(), [
                    'idpage' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'like-page-quality',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpage = $request->idpage;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->likePageQuality($idpage, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idpage'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order like page quality với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like-page-quality',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'like-page-sale') {
                $validator = Validator::make($request->all(), [
                    'idpage' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'like-page-sale',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpage = $request->idpage;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->likePageSale($idpage, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idpage'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order like page sale với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like-page-sale',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'like-page-speed') {
                $validator = Validator::make($request->all(), [
                    'idpage' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'like-page-speed',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpage = $request->idpage;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->likePageSpeed($idpage, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idpage'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order like page speed với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'like-page-speed',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'eye-live') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|numeric',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'minutes' => 'required|numeric',
                    'note' => 'string',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'mat-live',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $minutes = $request->minutes;
                            $note = $request->note;
                            $result = $sgr->eyeLive($idpost, $server_order, $amount, $minutes, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                $idfb = $result['data']['idpost'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];

                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order mat live với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'eye-live',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idfb,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'view-video') {
                $validator = Validator::make($request->all(), [
                    'link_video' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'time' => 'required|numeric',
                    'note' => 'string',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'view-video',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $link_video = $request->link_video;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $time = $request->time;
                            $note = $request->note;
                            $result = $sgr->viewVideo($link_video, $server_order, $amount, $time, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                //$idfb = $result['data']['idpost'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order view video với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'view-video',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $link_video,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'share-profile') {
                $validator = Validator::make($request->all(), [
                    'idpost' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'share-profile',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idpost = $request->idpost;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->shareProfile($idpost, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                //$idfb = $result['data']['idpost'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order share profile với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'share-profile',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idpost,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'member-group') {
                $validator = Validator::make($request->all(), [
                    'idgroup' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'member-group',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idgroup = $request->idgroup;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->memberGroup($idgroup, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                //$idfb = $result['data']['idpost'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];


                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order member group với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'member-group',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idgroup,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'view-story') {
                $validator = Validator::make($request->all(), [
                    'idstory' => 'required|string',
                    'server_order' => 'required|string',
                    'amount' => 'required|numeric',
                    'note' => 'string',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors()->first(),
                    ]);
                } else {
                    $server = service_servers::where([
                        'type' => 'facebook',
                        'code_server' => 'view-story',
                        'server_service' => $request->server_order,
                        'api_server' => 'subgiare'
                    ])->first();
                    if (!$server) {
                        return response()->json(['status' => false, 'message' => 'Server không tồn tại'], 201);
                    } elseif ($server->status_server == 'off') {
                        return response()->json(['status' => false, 'message' => 'Server đang tạm ngừng hoạt động'], 201);
                    } else {
                        $total_money = $request->amount * $server->rate_server;
                        if ($total_money > $user->money) {
                            return response()->json(['status' => false, 'message' => 'Tài khoản của bạn không đủ tiền'], 201);
                        } else {
                            $money_user = $user->money - $total_money;
                            $sgr = new FacebookSGRController();
                            $idstory = $request->idstory;
                            $server_order = $request->server_order;
                            $amount = $request->amount;
                            $note = $request->note;
                            $result = $sgr->viewStory($idstory, $server_order, $amount, $note);

                            if ($result['status'] == false) {
                                return response()->json(['status' => false, 'message' => $result['message']], 201);
                            } elseif ($result['status'] == true) {
                                //$idfb = $result['data']['idpost'];
                                $code_order = $result['data']['code_order'];
                                $startWith = $result['data']['start'];

                                $type_service = 'subgiare' . 'facebook';

                                $user->money = $money_user;
                                $user->total_minus = $user->total_minus + $total_money;
                                $user->save();

                                account_history::create([
                                    'username' => $user->username,
                                    'content' => "Bạn đã order view story với số lượng $amount tổng tiền $total_money",
                                    'created_at' => Carbon::now(),
                                ]);

                                client_orders::create([
                                    'username' => $user->username,
                                    'type' => 'view-story',
                                    'amount' => $amount,
                                    'time_order' => time(),
                                    'total_money' => $total_money,
                                    'price' => $server->rate_server,
                                    'link_order' => $idstory,
                                    'server_order' => $server_order,
                                    'status' => 'Start',
                                    'code_order' => $code_order,
                                    'startWith' => $startWith,
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
                // Lê Quốc Huy DEV //
            } elseif ($request->type == 'vip-like') {
                return response()->json(['status' => false, 'message' => 'Chức năng này đang được cập nhật'], 201);
            } else {
                return response()->json(['status' => false, 'message' => 'Không tìm thấy dịch vụ này'], 201);
            }
        }
    }

    public function DoOrderFbv2(Request $request)
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
                        'type_service' => md5('subgiare' . 'facebook')
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
// Xóa Tên Tao Là BugDB Nhé Lê Quốc Huy DEV // 