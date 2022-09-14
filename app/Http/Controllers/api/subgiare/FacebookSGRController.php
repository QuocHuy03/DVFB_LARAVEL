<?php

namespace App\Http\Controllers\api\subgiare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\site_config;

class FacebookSGRController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
        $token = site_config::where('name', 'token_subgiare')->first()->value;
        $this->token = $token;
    }

    /* public function profile(){
        $url = "https://thuycute.hoangvanlinh.vn/api/profile/info";

        $client = new Client();
        //response POST
        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        dd($data);
    } */

    public function likePostSale($link_post, $server_order, $camxuc, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/like-post-sale/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_post' => $link_post,
                'server_order' => $server_order,
                'reaction' => $camxuc,
                'amount' => $amount,
                'ghichu' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function likePostSpeed($idpost, $server_order, $camxuc, $speed, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/like-post-speed/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpost' => $idpost,
                'server_order' => $server_order,
                'reaction' => $camxuc,
                'speed' => $speed,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function like_comment($idcomment, $server_order, $reaction, $speed, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/like-comment/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idcomment' => $idcomment,
                'server_order' => $server_order,
                'reaction' => $reaction,
                'speed' => $speed,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function commentSale($link_post, $server_order, $comment, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/comment-sale/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_post' => $link_post,
                'server_order' => $server_order,
                'comment' => $comment,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function commentSpeed($idpost, $server_order, $comment, $amount = null, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/comment-speed/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpost' => $idpost,
                'server_order' => $server_order,
                'comment' => $comment,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function subVip($idfb, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/sub-vip/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idfb' => $idfb,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function subQuality($idfb, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/sub-quality/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idfb' => $idfb,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function subSale($idfb, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/sub-sale/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idfb' => $idfb,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function subSpeed($idfb, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/sub-speed/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idfb' => $idfb,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function likePageQuality($idpage, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/like-page-quality/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpage' => $idpage,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function likePageSale($idpage, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/like-page-sale/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpage' => $idpage,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function likePageSpeed($idpage, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/like-page-speed/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpage' => $idpage,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function eyeLive($idpost, $server_order, $amount, $minutes, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/eye-live/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpost' => $idpost,
                'server_order' => $server_order,
                'amount' => $amount,
                'minutes' => $minutes,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function shareProfile($idpost, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/share-profile/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpost' => $idpost,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function memberGroup($idgroup, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/member-group/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idgroup' => $idgroup,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function viewStory($link_story, $server_order, $amount, $ghichu = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/view-story/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_story' => $link_story,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $ghichu,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function viewVideo($idpost, $server_order, $amount, $time, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/view-video/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idpost' => $idpost,
                'server_order' => $server_order,
                'amount' => $amount,
                'time' => $time,
                'note' => $note,
            ],
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function vipLike($idfb, $server_order, $days, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/facebook/vip-like/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'idfb' => $idfb,
                'server_order' => $server_order,
                'days' => $days,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function headers()
    {
        $headers = [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36',
            'Accept' => 'application/json',
            'Accept-Language' => 'en-US,en;q=0.9',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Connection' => 'keep-alive',
            'Sec-Fetch-Dest' => 'empty',
            'Sec-Fetch-Mode' => 'cors',
            'Sec-Fetch-Site' => 'same-origin',
            'X-Requested-With' => 'XMLHttpRequest',
            'DNT' => '1',
            'Api-token' => $this->token,
        ];

        return $headers;
    }
}
