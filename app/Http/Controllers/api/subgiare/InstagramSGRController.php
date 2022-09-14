<?php

namespace App\Http\Controllers\api\subgiare;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\site_config;

class InstagramSGRController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
        $token = site_config::where('name', 'token_subgiare')->first();
        $this->token = $token->value;
    }
    public function likePost($link_post, $server_order, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/instagram/like-post/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'link_post' => $link_post,
                'server_order' => $server_order,
                'amount' => $amount,
                'note' => $note,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function sub($username, $server, $amount, $note = null)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/instagram/sub/order";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'username' => $username,
                'server_order' => $server,
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
