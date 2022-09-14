<?php

namespace App\Http\Controllers\api\subgiare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use GuzzleHttp\Client;
use App\Models\site_config;

class TikTokSGRController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('XSS');
        $token = site_config::where('name', 'token_subgiare')->first();
        $this->token = $token->value;
    }

    public function like($link_video, $server_order, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/tiktok/like/order";

        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_video' => $link_video,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function comment($link_video, $server_order, $cmt, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/tiktok/comment/order";

        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_video' => $link_video,
                'server_order' => $server_order,
                'comment' => $cmt,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function share($link_video, $server_order, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/tiktok/share/order";

        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_video' => $link_video,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function sub($link_video, $server_order, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/tiktok/sub/order";

        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'username' => $link_video,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function view($link_video, $server_order, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/tiktok/view/order";

        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_video' => $link_video,
                'server_order' => $server_order,
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
            'Accept' => '*/*',
            'Api-token' => $this->token,
            'Content-Type' => 'application/x-www-form-urlencoded',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36',
        ];
        return $headers;
    }
}
