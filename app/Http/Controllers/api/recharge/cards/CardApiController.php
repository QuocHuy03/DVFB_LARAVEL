<?php

namespace App\Http\Controllers\api\recharge\cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\site_config;

class CardApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function charginTtvPay($Pin, $Seri, $CardType, $CardValue, $requestid)
    {
        $partner_key = site_config::where('name', 'parther_key')->first()->value;
        $client = new Client();
        $url = "https://api.ttvpay.vn/api/card";
        $headers = [
            "Content-Type" => "application/json",
        ];
        $dataPost = [
            'ApiKey' => $partner_key,
            'Pin' => $Pin,
            'Seri' => $Seri,
            'CardType' => $CardType,
            'CardValue' => $CardValue,
            'requestid' => $requestid
        ];

        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'form_params' => [
                'ApiKey' => $partner_key,
                'Pin' => $Pin,
                'Seri' => $Seri,
                'CardType' => $CardType,
                'CardValue' => $CardValue,
                'requestid' => $requestid
            ],
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }


    public function charginTSR($telCo, $amount, $pin, $serial, $requestId)
    {
        $partner_id = site_config::where('name', 'parther_id')->first()->value;
        $partner_key = site_config::where('name', 'parther_key')->first()->value;
        $client = new Client();
        $url = 'https://thesieure.com/chargingws/v2?sign=' . md5($partner_key . $pin . $serial) . '&telco=' . $telCo . '&code=' . $pin . '&serial=' . $serial . '&amount=' . $amount . '&request_id=' . $requestId . '&partner_id=' . $partner_id . '&command=charging';

        $response = $client->request('GET', $url);
        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }
}
