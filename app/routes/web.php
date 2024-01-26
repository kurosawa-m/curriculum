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
//権限
Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    Route::get('account', 'AccountController@index')->name('account.index');
});

Auth::routes();
Route::group(['middleware' => 'auth'],function(){

Route::get('/', [DisplayController::class,'index']);//トップページ
Route::get('/goods/{id}/detail',[DisplayController::class,'goodsDetail'])->name('goods.detail');//トップページから商品詳細画面へ

Route::get('/shop_toppage', [DisplayController::class, 'shopTop'])->name('shop.toppage');//トップページから事業者トップページへ遷移
Route::get('/user_list', [DisplayController::class, 'userList'])->name('user.list');//事業者トップページからユーザーリストへ遷移
Route::get('/sales_mgmt', [DisplayController::class, 'salesMgmt'])->name('sales.mgmt');//事業者トップページから売上管理画面へ遷移

Route::get('/goods/{id}/edit',[DisplayController::class,'editGoods'])->name('goods.edit');//事業者トップページから商品編集（商品詳細）画面へ遷移
Route::post('/edit_goods/{id}',[RegistrationController::class, 'updateGoods'])->name('goods.update');//事業者_商品編集DBへ登録

Route::get('/reg_form', [DisplayController::class, 'registrationForm'])->name('registration.form');//事業者トップページから商品登録画面へ遷移
Route::post('/confirm_reg', [DisplayController::class, 'sendRegData'])->name('confirmReg.goods');//商品登録画面から登録確認画面へ遷移
Route::post('/registration_goods', [RegistrationController::class, 'registrationGoods'])->name('registration.goods');//商品登録

Route::post('/cart',[RegistrationController::class, 'toCart'])->name('transition.cart');//->middleware('auth');  //カート内商品一覧へ遷移、カートに商品追加
Route::get('/confirm_address',[DisplayController::class, 'confirmAddress'])->name('confirm.address');//カート内商品一覧から送り先確認画面へ遷移
Route::post('/confirm_order/{id}',[RegistrationController::class, 'registrationUserinfo'])->name('reg.userinfo');//送り先情報保存→お届け先確認から注文内容確認へ遷移
Route::post('/order_completed/{id}',[RegistrationController::class, 'orderCompleted'])->name('order.completed');//購入完了buy_flgを1に


Route::get('/mypage', [DisplayController::class, 'toMypage'])->name('to.mypage');//マイページへ遷移
Route::get('/user_info', [DisplayController::class, 'toUserinfo'])->name('user.info');//ユーザー情報変更画面へ遷移
Route::post('/registration_goods/{id}', [RegistrationController::class, 'updateUserinfo'])->name('update.userinfo');//変更後ユーザー情報登録
Route::get('/cart', [DisplayController::class, 'headerTocart'])->name('header.tomypage');//マイページへ遷移

});