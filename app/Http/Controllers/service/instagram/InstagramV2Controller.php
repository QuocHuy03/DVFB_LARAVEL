<?php

namespace App\Http\Controllers\service\instagram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\site_config;
use App\Models\client_orders;
use App\Models\service_servers;
use Illuminate\Support\Facades\Auth;


class InstagramV2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index(Request $request)
    {
        $type = $request->type;
        switch ($type) {
            case 'like-post':
                $title = 'Like bài viết Instagram';
                $code = 'like-instagram';
                break;
            case 'follow':
                $title = 'Theo dõi tài khoản Instagram';
                $code = 'sub-instagram';
                break;
            default:
                return abort(404);
                break;
        }

        $server = service_servers::where([
            'type' => 'instagram',
            'code_server' => $code,
            'api_server' => 'subgiare'
        ])->get();
        $OderIg = client_orders::where('username', Auth::user()->username)
            ->get();
        return view('service.instagram.instagram-v2', compact('title', 'type', 'server', 'OderIg'));
    }

    // public function DoOrderIv2(Request $request){
    //     $title = "Đơn hàng " . $request->type . " Instagram";
    //     $type = $request->type;
    //     switch($type){
    //         case 'like-post':
    //             $title = 'Like bài viết Instagram';
    //             $code = 'like-instagram';
    //             break;
    //         case 'follow':
    //             $title = 'Theo dõi tài khoản Instagram';
    //             $code = 'sub-instagram';
    //             break;
    //         default:
    //             return abort(404);
    //             break;
    //     }

    //     $orders = client_orders::where([
    //         'username' => Auth::user()->username,
    //         'type_service' => md5('subgiare' . 'instagram'),
    //     ])->get();
    //     return view('history.instagram.historyIg', compact('title', 'type', 'orders'));
    // }
}
