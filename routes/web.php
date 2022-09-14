<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageClientsController;
use App\Http\Controllers\admin\PageAdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\service\facebook\FacebookV2Controller;
use App\Http\Controllers\service\instagram\InstagramV2Controller;
use App\Http\Controllers\service\tiktok\TiktokV2Controller;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\ServiceAccountController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('runsql', function(){
    Artisan::call('migrate:fresh --seed');
    return "done";
}); */

Route::get('file', [FileController::class, 'index']);
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'DoLogin'])->name('auth.login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'DoRegister'])->name('auth.register.post');
});
Route::get('/', function () {
    return view('auth.login');
});
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/home', [PageClientsController::class, 'index'])->name('home');
    Route::get('/account/profile', [PageClientsController::class, 'profile'])->name('profile');
    Route::get('/account/profile', [PageClientsController::class, 'historys'])->name('profile');

    Route::post('/account/change-password', [PageClientsController::class, 'changePassword'])->name('change-password');
    Route::get('/api-document', [PageClientsController::class, 'apiDocument'])->name('api-document');
    Route::get('/cap-bac', [PageClientsController::class, 'capbac'])->name('cap-bac');
    Route::get('/site', [PageClientsController::class, 'site'])->name('site');
});
#baking
Route::prefix('/recharge')->middleware('auth')->group(function () {
    Route::get('/banking', [RechargeController::class, 'banking'])->name('banking');
    Route::get('/card', [RechargeController::class, 'card'])->name('card');
    Route::post('/card', [RechargeController::class, 'Docard'])->name('card.post');
});
#service
Route::prefix('/service')->middleware('auth')->group(function () {
    Route::get('/service/account/{type}', [ServiceAccountController::class, 'index'])->name('service.account');
    Route::get('/service/account/buy/{type}', [ServiceAccountController::class, 'buy'])->name('service.account.buy');
    Route::post('/service/account/buy/{type}', [ServiceAccountController::class, 'DoAccount'])->name('service.account.post');


    Route::get('/facebook-v2/{type}', [FacebookV2Controller::class, 'index'])->name('service.facebook-v2');
    Route::get('/facebook-v2/{type}/order', [FacebookV2Controller::class, 'DoOrderFbv2'])->name('service.facebook-v2.order');



    Route::get('/instagram-v2/{type}', [InstagramV2Controller::class, 'index'])->name('service.instagram-v2');
    Route::get('/instagram-v2/{type}/order', [InstagramV2Controller::class, 'DoOrderIv2'])->name('service.instagram-v2.order');
    Route::get('/tiktok-v2/{type}', [TiktokV2Controller::class, 'index'])->name('service.tiktok-v2');
    Route::get('/tiktok-v2/{type}/order', [TiktokV2Controller::class, 'DoOrderTv2'])->name('service.tiktok-v2.order');
});



#admin
Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/', [PageAdminController::class, 'index'])->name('admin.index');
    Route::get('/configWebsite', [PageAdminController::class, 'configWebsite'])->name('admin.configWebsite');
    Route::post('/configWebsite', [PageAdminController::class, 'DoConfigWebsite'])->name('admin.configWebsite.post');
    Route::get('/clients', [PageAdminController::class, 'clients'])->name('admin.clients');
    Route::get('/clients/edit/{id}', [PageAdminController::class, 'editClient'])->name('admin.clients.edit');
    Route::post('/clients/edit/{id}', [PageAdminController::class, 'DoEditClient'])->name('admin.clients.edit.post');
    Route::get('/clients/delete/{id}', [PageAdminController::class, 'deleteClient'])->name('admin.clients.delete');
    Route::get('/recharge', [PageAdminController::class, 'recharge'])->name('admin.recharge');
    Route::post('recharge', [PageAdminController::class, 'DoRecharge'])->name('admin.recharge.post');
    Route::get('/recharge/edit/{id}', [PageAdminController::class, 'editRecharge'])->name('admin.recharge.edit');
    Route::post('/recharge/edit/{id}', [PageAdminController::class, 'DoEditRecharge'])->name('admin.recharge.edit.post');
    Route::get('/recharge/delete/{id}', [PageAdminController::class, 'deleteRecharge'])->name('admin.recharge.delete');
    Route::post('/transfer_code', [PageAdminController::class, 'transferCode'])->name('admin.transfer_code');
    #card
    Route::get('/recharge/card', [PageAdminController::class, 'rechargeCard'])->name('admin.recharge.card');
    Route::post('/recharge/card', [PageAdminController::class, 'DoRechargeCard'])->name('admin.recharge.card.post');
    #manager bank
    Route::get('/manager-bank', [PageAdminController::class, 'managerBank'])->name('admin.manager-bank');
    Route::get('/notice', [PageAdminController::class, 'notice'])->name('admin.notice');
    Route::post('/notice/add', [PageAdminController::class, 'addNotice'])->name('admin.notice.add');
    Route::post('/notice/update', [PageAdminController::class, 'updateNotice'])->name('admin.notice.update');
    Route::get('/notice/delete/{id}', [PageAdminController::class, 'deleteNotice'])->name('admin.notice.delete');
    Route::get('/block-ip', [PageAdminController::class, 'blockIp'])->name('admin.block-ip');
    Route::post('/block-ip', [PageAdminController::class, 'DoBlockIp'])->name('admin.block-ip.post');
    Route::get('/block-ip/delete/{id}', [PageAdminController::class, 'deleteBlockIp'])->name('admin.block-ip.delete');
    #Cài đặt admin
    Route::get('/settingAdmin', [PageAdminController::class, 'settingAdmin'])->name('admin.settingAdmin');
    Route::post('/settingAdmin', [PageAdminController::class, 'DoSettingAdmin'])->name('admin.settingAdmin.post');
    Route::get('/service/auto', [ServiceController::class, 'autoService'])->name('admin.service.auto');
    #
    Route::get('/client/orders', [PageAdminController::class, 'clientOrders'])->name('admin.client.orders');
    #service
    Route::get('/service/{type}', [ServiceController::class, 'index'])->name('admin.service');
    Route::post('/service/{type}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::post('/service/{type}/add', [ServiceController::class, 'add'])->name('admin.service.add');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('/service/update/{id}', [ServiceController::class, 'updateSV'])->name('admin.service.updateSV');
    Route::get('/service/status/{id}', [ServiceController::class, 'status'])->name('admin.service.status');
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete'])->name('admin.service.delete');
    Route::get('/service/account/orders', [ServiceController::class, 'accountOrders'])->name('admin.service.account.orders');
    Route::post('/service/account/orders', [ServiceController::class, 'DoAccountOrders'])->name('admin.service.account.orders.post');
    Route::post('/service/account/type,{type}', [ServiceController::class, 'DoAccountType'])->name('admin.service.account.type.post');
});
// huycoder bản quyền có 1 k 2 nên xóa là bị bug nhé -->FB : https://www.facebook.com/lqh.coder