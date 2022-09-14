<?php

namespace App\Http\Controllers\service\facebook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\site_config;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\service_servers;
use App\Models\client_orders;
use Illuminate\Support\Facades\Auth;


class FacebookV2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    // 2 cách 

    public function index(Request $request)
    {
        $type = $request->type;
        switch ($type) {
            case 'like-sale':
                $title = 'Tăng like sale';
                $code = "like-post-sale";
                break;
            case 'like-speed':
                $title = 'Tăng like speed';
                $code = "like-post-speed";
                break;
            case 'like-comment':
                $title = 'Tăng like comment';
                $code = "like-comment";
                break;
            case 'comment-sale':
                $title = 'Tăng comment sale';
                $code = "comment-sale";
                break;
            case 'comment-speed':
                $title = 'Tăng comment speed';
                $code = "comment-speed";
                break;
            case 'sub-vip':
                $title = 'Tăng sub vip';
                $code = "sub-vip";
                break;
            case 'sub-sale':
                $title = 'Tăng sub sale';
                $code = "sub-sale";
                break;
            case 'sub-speed':
                $title = 'Tăng sub speed';
                $code = "sub-speed";
                break;
            case 'sub-quality':
                $title = "Tăng sub quality";
                $code = "sub-quality";
                break;
            case 'like-page-sale':
                $title = "Tăng like page sale";
                $code = "like-page-sale";
                break;
            case 'like-page-speed':
                $title = "Tăng like page speed";
                $code = "like-page-speed";
                break;
            case 'eye-live':
                $title = "Tăng eye live";
                $code = "mat-live";
                break;
            case 'view-video':
                $title = "Tăng view video";
                $code = "view-video";
                break;
            case 'share-profile':
                $title = "Tăng share profile";
                $code = "share-profile";
                break;
            case 'member-group':
                $title = "Tăng member group";
                $code = "member-group";
                break;
            case 'view-story':
                $title = "Tăng view story";
                $code = "view-story";
                break;
            case 'vip-like':
                $title = "Tăng vip like";
                $code = "vip-like";
                break;
            default:
                return abort(404);
                break;
        }
        $server = service_servers::where([
            'type' => 'facebook',
            'code_server' => $code,
            'api_server' => 'subgiare'
        ])->get();
        $listOrder = client_orders::where('username', Auth::user()->username)
            ->get();
        return view('service.facebook.facebook-v2', compact('title', 'type', 'server', 'listOrder'));
    }

    // Le Quoc Huy Coder
}
