<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', [DisplayController::class,'index']);//トップページ
Route::get('/goods/{id}/detail',[DisplayController::class,'goodsDetail'])->name('goods.detail');//トップページから商品詳細画面へ

Route::get('/shop_toppage', [DisplayController::class, 'shopTop'])->name('shop.toppage');//トップページから事業者トップページへ遷移
Route::get('/user_list', [DisplayController::class, 'userList'])->name('user.list');//事業者トップページからユーザーリストへ遷移
Route::get('/sales_mgmt', [DisplayController::class, 'salesMgmt'])->name('sales.mgmt');//事業者トップページから売上管理画面へ遷移

Route::get('/reg_form', [DisplayController::class, 'registrationForm'])->name('registration.form');//事業者トップページから商品登録画面へ遷移
Route::post('/confirm_reg', [DisplayController::class, 'sendRegData'])->name('confirmReg.goods');//商品登録画面から登録確認画面へ遷移
Route::post('/registration_goods', [RegistrationController::class, 'registrationGoods'])->name('registration.goods');//商品登録