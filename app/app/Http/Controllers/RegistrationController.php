<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;
use App\Buy;
use App\User;
use App\Review;

use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function registrationGoods(Request $request){//商品登録
                
        $reg_goods = new Goods;
        $reg_goods->name = $request->name;
        $reg_goods->image = $request->image;
        $reg_goods->content = $request->content;
        $reg_goods->amount = $request->amount;
        $reg_goods->user_id = Auth::user()->id;
        $reg_goods->save();

        // 一時保存から本番の格納場所へ移動
        rename(public_path() . "/img/tmp/" . $request->image, public_path() . "/img/" . $request->image);
        
        // 一時保存の画像を削除
        \File::cleanDirectory(public_path() . "/img/tmp");
        return redirect('/shop_toppage');

    }

    public function updateGoods(int $id, Request $request) {//事業者_商品編集DBへ登録

        $goods = new Goods;
        $record = $goods->find($id);

        $columns = ['name','content','amount'];

        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        $record->save();

        return redirect('/shop_toppage');
    }


    public function toCart(Request $request){//カート内商品一覧へ遷移

        $buys = new Buy;
        $goods = new Goods;

        $columns = ['quantity','goods_id'];
        foreach($columns as $column){//Buyテーブルに登録
            $buys->$column = $request->$column;
        }
        Auth::user()->buy()->save($buys);

        $cart = Auth::user()->buy()->where('buy_flg','=',0)->with('Goods')->get();//リレーションしたgoodsテーブルの情報も一緒にselect

        return view('cart',[
            'carts'=> $cart,
        ]);
    }

    
    public function updateUserinfo(int $id, Request $request) {//変更後ユーザー情報登録

        $users = new User;
        $record = $users->find($id);

        if(!isset($user['fullname'])){

            $columns = ['name','email','password'];
            foreach($columns as $column){
            $record->$column = $request->$column;

        }}else{

            $columns = ['name','email','password','fullname','tel','postcode','address'];
            foreach($columns as $column){
            $record->$column = $request->$column;

        }};

        $record->save();

        return redirect('/mypage');
    }
    
    public function registrationUserinfo(int $id, Request $request){//送り先情報保存→お届け先確認から注文内容確認へ遷移
        //送り先情報保存
        $users = new User;
        $record = $users->find($id);

        $columns = ['email','fullname','tel','postcode','address'];
        foreach($columns as $column){
        $record->$column = $request->$column;
        }

        $record->save();

        //お届け先確認から注文内容確認へ遷移
        $buys = new Buy;
        $goods = new Goods;

        $cart = Auth::user()->buy()->where('buy_flg','=',0)->with('Goods')->get();//リレーションしたgoodsテーブルの情報も一緒にselect
        $users = Auth::user();

        return view('confirm_order',[
            'carts'=> $cart,
            'user'=> $users,
        ]);
    }

    
    public function orderCompleted(int $id, Request $request){//購入完了buy_flgを1に
        
        $buys = new Buy;
        $goods = new Goods;
        
        $record = Auth::user()->buy()->where('buy_flg','=',0)->with('Goods')->get();//カート情報
        
        foreach($record as $records){//複数データある（カートに商品複数ある）のでforeach
            $records->buy_flg = 1;//購入フラグ
            $records->save();
        }

        return redirect('/');

    }

        public function completedRegReview(Request $request) {//レビュー内容登録、商品詳細ページへ遷移

        $reviews = new Review;
        $reviews->title = $request->title;
        $reviews->comment = $request->comment;
        $reviews->goods_id = $request->id;

        $reviews->save();

        return redirect('/mypage');
    }

    
    public function confirmAddress(Request $request) {//カート内で数量変更→住所登録画面へ

        $buys = new Buy;
        $buy_id = Buy::where('user_id',$request->input('data')[0]['id'])->get();

        foreach($buy_id as $buy){
            foreach($request->input('data') as $val){
                if($buy['goods_id']==$val['goods_id']){
                $buy->quantity = $val['quantity'];
                $buy->goods_id = $val['goods_id'];
                $buy->user_id = $val['id'];
            $buy->save();
                }
            }
        }

        $all = Auth::user();

        return view('confirm_address',[
            'user'=> $all,
        ]);
    }


    public function deleteUser(int $id){//ユーザー削除（退会）

        Auth::User($id)->delete();
        return redirect('/');
        
    }


    public function deleteCart(int $id){//カート内商品削除

        $instance = new Buy;

        $buys = $instance->find($id);

        $buys->delete();

        return redirect('/cart');
    }
    
}