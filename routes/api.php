<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MbBankController;
use App\Http\Controllers\api\tool\ToolController;
use App\Http\Controllers\api\profile\InfoController;
use App\Http\Controllers\api\subgiare\FacebookSGRController;
use App\Http\Controllers\api\service\facebook\ApiV2Controller;
use App\Http\Controllers\api\cron\tools\checkUIDLiveController;
use App\Http\Controllers\api\cron\history\HistoryFbSgrController;
use App\Http\Controllers\api\cron\history\HistoryInsSgrController;
use App\Http\Controllers\api\service\instagram\InsApiV2Controller;
use App\Http\Controllers\api\service\tiktok\TiktokApiV2Controller;
use App\Http\Controllers\api\cron\callback\CallBackCardsController;
use App\Http\Controllers\api\cron\history\HistoryTikTokSgrController;
use App\Http\Controllers\api\recharge\banking\CallbackBankController;
use App\Http\Controllers\api\recharge\banking\ApiCallbackBankingController;
/*
|--------------------------------------------------------------------------
| API Routes -> huycoder bản quyền có 1 k 2 nên xóa là bị bug nhé -->FB : https://www.facebook.com/lqh.coder
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/mbbank', [MbBankController::class, 'apimb'])->name('apimb');
// Route::get('/admin', function () {
//     return "ok";
// });
Route::post('/tools/getUID', [ToolController::class, 'getUID']);
Route::post('profile/info', [InfoController::class, 'index'])->name('profile.info');


Route::prefix('/service')->group(function () {
    Route::post('facebook-v2/{type}', [ApiV2Controller::class, 'index'])->name('api.service.facebook-v2');
    Route::post('/instagram-v2/{type}', [InsApiV2Controller::class, 'index'])->name('api.service.instagram-v2');
    Route::post('/tiktok-v2/{type}', [TiktokApiV2Controller::class, 'index'])->name('api.service.tiktok-v2');

    Route::post('/facebook-v2/{type}/order', [ApiV2Controller::class, 'DoOrderFbv2'])->name('api.service.facebook-v2.order');
    Route::post('/instagram-v2/{type}/order', [InsApiV2Controller::class, 'DoOrderInsV2'])->name('api.service.instagram-v2.order');
    Route::post('/tiktok-v2/{type}/order', [TiktokApiV2Controller::class, 'DoOrderTiktokV2'])->name('api.service.tiktok-v2.order');
});

Route::prefix('cron')->group(function () {
    Route::get('/checkUidLive', [checkUIDLiveController::class, 'index']);
    Route::prefix('list')->group(function () {
        Route::get('/facebook-v2', [HistoryFbSgrController::class, 'facebookV2']);
        Route::get('/instagram-v2', [HistoryInsSgrController::class, 'instagramV2']);
        Route::get('/tiktok-v2', [HistoryTikTokSgrController::class, 'tiktokV2']);
    });
    #cards
    Route::prefix('callback/cards')->group(function () {
        Route::get('ttvpay', [CallBackCardsController::class, 'callbackTTvPay']);
        Route::get('thesieure', [CallBackCardsController::class, 'callbackTSR']);
    });
    Route::prefix('callback/banking')->group(function () {
        Route::get('tsr', [CallbackBankController::class, 'thesieure']);
        Route::get('momo', [ApiCallbackBankingController::class, 'momo']);
        Route::get('vietcombank', [ApiCallbackBankingController::class, 'vietcombank']);
        Route::get('mbbank', [ApiCallbackBankingController::class, 'mbbank']);
    });
});


// api mb bank //
