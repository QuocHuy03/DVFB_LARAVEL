<?php

namespace App\Http\Controllers\api\tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class ToolController extends Controller
{
    public function __construct()
    {
        $this->middleware('XSS');
    }

    public function getUID(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 200);
        }
        $url = "https://id.traodoisub.com/api.php";
        $headers = [
            "accept: application/json, text/javascript, */*; q=0.01"
        ];
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'form_params' => [
                'link' => $request->link
            ]
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);
        if (isset($data['error'])) {
            return response()->json([
                'status' => false,
                'message' => $data['error']
            ], 200);
        } else {
            return response()->json([
                'status' => true,
                'message' => $data['id']
            ], 200);
        }
    }
}
