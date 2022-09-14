<?php

namespace App\Http\Controllers\api\cron\history;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client_orders;
use App\Models\site_config;
use GuzzleHttp\Client;

class HistoryTikTokSgrController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
        $token = site_config::where('name', 'token_subgiare')->first()->value;
        $this->token = $token;
    }

    public function tiktokV2()
    {
        $fb = client_orders::where([
            'status' => 'Start',
            'type_service' => md5('subgiare' . 'tiktok')
        ])->get();
        $result = array();
        foreach ($fb as $key) {
            $code = $key->code_order;
            $type = $key->type;
            $result[] = array(
                $this->getList($type, $code)
            );
        }
        //var_dump($result);
        $arr = array();
        foreach ($result as $key) {
            foreach ($key as $value) {
                if (isset($value['status']) == true) {
                    foreach ($value['data'] as $i) {
                        $code_order = $i['code_order'];
                        $start = $i['start'];
                        $buff = $i['buff'];
                        $status = $i['status'];
                        client_orders::where('code_order', $code_order)->update([
                            'status' => $status,
                            'startWith' => $start,
                            'buff' => $buff
                        ]);
                    }
                }
            }
        }
    }

    public function getList($type, $code_order)
    {
        $url = "https://thuycute.hoangvanlinh.vn/api/service/tiktok/$type/list";
        $client = new Client();

        $response = $client->request('POST', $url, [
            'headers' => $this->headers(),
            'form_params' => [
                'code_orders' => $code_order,
            ],
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        return $data;
    }

    public function headers()
    {
        $headers = [
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
