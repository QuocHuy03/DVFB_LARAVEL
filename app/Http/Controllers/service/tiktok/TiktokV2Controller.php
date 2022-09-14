<?php

namespace App\Http\Controllers\service\tiktok;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service_servers;
use App\Models\client_orders;
use Illuminate\Support\Facades\Auth;

class TiktokV2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index(Request $request)
    {
        $type = $request->type;
        switch ($type) {
            case 'like':
                $title = 'Tăng tym video';
                $code = 'tym-tiktok';
                break;
            case 'comment':
                $title = 'Tăng bình luận video';
                $code = 'comment-tiktok';
                break;
            case 'share':
                $title = 'Tăng chia sẻ video';
                $code = 'share-tiktok';
                break;
            case 'sub':
                $title = 'Tăng sub video';
                $code = 'sub-tiktok';
                break;
            case 'view':
                $title = 'Tăng view video';
                $code = 'view-tiktok';
                break;
            default:
                return abort(404);
                break;
        }
        $server = service_servers::where([
            'type' => 'tiktok',
            'code_server' => $code,
            'api_server' => 'subgiare'
        ])->get();
        $OderTik = client_orders::where('username', Auth::user()->username)
            ->get();
        return view('service.tiktok.tiktok-v2', compact('title', 'type', 'server', 'OderTik'));
    }

    // public function DoOrderTv2(Request $request){
    //     $title = "Đơn hàng " . $request->type . " Tiktok";
    //     $type = $request->type;
    //     switch($type){
    //         case 'like':
    //             $title = 'Tăng tym video';
    //             $code = 'tym-tiktok';
    //             break;
    //         case 'comment':
    //             $title = 'Tăng bình luận video';
    //             $code = 'comment-tiktok';
    //             break;
    //         case 'share':
    //             $title = 'Tăng chia sẻ video';
    //             $code = 'share-tiktok';
    //             break;
    //         case 'sub':
    //             $title = 'Tăng sub video';
    //             $code = 'sub-tiktok';
    //             break;
    //         case 'view':
    //             $title = 'Tăng view video';
    //             $code = 'view-tiktok';
    //             break;
    //         default:
    //             return abort(404);
    //             break;
    //     }
    //     $orders = client_orders::where([
    //         'username' => Auth::user()->username,
    //         'type_service' => md5('subgiare' . 'tiktok'),
    //     ])->get();
    //     return view('history.tiktok.historyTt', compact('title', 'type', 'orders'));
    // }
}
