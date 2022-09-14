<?php

namespace App\Http\Controllers\api\cron\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\account_fb;

class checkUIDLiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function index()
    {
        $acc = account_fb::all();
        foreach ($acc as $item) {
            $type = $item->type;
            if ($type == 'clone') {
                $a = explode('|', $item->acc);
                $uid = $a[0];
                $check = $this->CheckLiveClone($uid);
                if ($check == 'LIVE') {
                    $item->status = 'LIVE';
                    $item->save();
                } else {
                    $item->status = 'DIE';
                    $item->save();
                }
            }/* elseif($type == 'via'){
                $a = explode('|', $item->acc);
                $uid = $a[0];
                $check = $this->CheckLiveVia($uid);
                if($check == 'LIVE'){
                    $item->status = 'LIVE';
                    $item->save();
                }else{
                    $item->status = 'DIE';
                    $item->save();
                }
            } */ else {
                continue;
            }
        }
    }

    public function CheckLiveClone($uid)
    {
        $url = "https://graph2.facebook.com/v3.3/" . $uid . "/picture?redirect=0";
        $client = new Client();
        $response = $client->request('GET', $url);
        $json = json_decode($response->getBody()->getContents(), true);
        if ($json['data']) {
            if (empty($json['data']['height']) && empty($json['data']['width'])) {
                return 'DIE';
            } else {
                return 'LIVE';
            }
        } else {
            return 'LIVE';
        }
    }
}
