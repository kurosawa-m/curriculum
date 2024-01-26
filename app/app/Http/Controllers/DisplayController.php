<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;
use App\Buy;
use App\User;

use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index() {//一般ユーザー＿トップページ

        $goods = new Goods;
        $all = $goods->all()->toArray();
        
        return view('home',[
            'goodsall'=> $all,
        ]);

    }

    public function goodsDetail(int $goodsId){//一般ユーザー＿商品詳細画面へ遷移
        $goods = new Goods;
        $goodsall = $goods->where('id','=',$goodsId)->first();//getだと連想配列で受け渡される、カート内とかの複数あり得るのはgetで
        return view('goods_detail',[
            'goodsId'=> $goodsall,
        ]);
    }

    public function shopTop(Request $request){//事業者トップページへ遷移
    
        $goods = new Goods;
        $all = $goods->all()->toArray();
        return view('shop_toppage',[
            'goodsall'=> $all,
        ]);
    }

    public function userList(Request $request){//事業者トップページからユーザーリストへ遷移
    
        $user = new User;
        $all = $user->all()->toArray();
        return view('user_list',[
            'users'=> $all,
        ]);
    }

    public function registrationForm(Request $request){//事業者トップページから商品登録画面へ遷移

        //事業者のID紐づける

        return view('reg_form');
    }

    public function sendRegData(Request $request){//商品登録画面から値保持して確認画面へ

        $goods = [
            // 'image'=>$request->file('image')->getClientOriginalName(),
            'name'=>$request->input('name'),
            'content'=>$request->input('content'),
            'amount'=>$request->input('amount'),
        ];

        // 拡張子つきでファイル名を取得
        $imageName = $request->file('image')->getClientOriginalName();//<input type='file' name='image'/>
        // 拡張子のみ
        $extension = $request->file('image')->getClientOriginalExtension();
        // 新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）→同じ名前の違う画像があるかも
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;
        $request->file('image')->move(public_path() . "/img/tmp", $newImageName);
        $image = "/img/tmp/" . $newImageName;//public/imgの中に/tmp作らなきゃダメだった

        return view('confirm_reg', [
            'goods' => $goods,
            'image' => $image,//見える
            'newImageName' => $newImageName,//hiddenにして見えないようにする
        ]);
    }
      
    public function salesMgmt(Request $request){//事業者トップページから売上管理画面へ遷移
    
        $buy = new Buy;
        $all = $buy->all()->toArray();//後でflg=1
        return view('sales_mgmt',[
            'buys'=> $all,
        ]);
    }

public function editGoods(int $goodsId){//事業者トップページから商品編集（商品詳細）画面へ遷移
    
        $goods = new Goods;
        $a_goods = $goods->where('id','=',$goodsId)->first();//getだと連想配列で受け渡される、カート内とかの複数あり得るのはgetで

        return view('edit_goods',[
            'goods'=> $a_goods,
        ]);
    }
    
    public function toMypage(Request $request){//マイページへ遷移
    
        // $user = new User;
        // $all = $user->all()->toArray();
        $all = Auth::user()->first();
        $buys = new Buy;
        $goods = new Goods;

        $cart = Auth::user()->buy()->where('buy_flg','=',1)->with('Goods')->get();//リレーションしたgoodsテーブルの情報も一緒にselect

        return view('mypage',[
            'user'=> $all,
            'carts'=> $cart,
        ]);
    }

    public function headerTocart(Request $request){//カート内商品一覧へ遷移

        $buys = new Buy;
        $goods = new Goods;

        $cart = Auth::user()->buy()->where('buy_flg','=',0)->with('Goods')->get();//リレーションしたgoodsテーブルの情報も一緒にselect

        return view('cart',[
            'carts'=> $cart,
        ]);
    }


    public function toUserinfo(Request $request){//マイページからユーザー情報変更画面へ遷移
    
        $all = Auth::user();

        return view('user_info',[
            'user'=> $all,
        ]);
    }

    
    public function confirmAddress(Request $request){//カート内商品一覧から送り先確認画面へ遷移
    
        $all = Auth::user();

        return view('confirm_address',[
            'user'=> $all,
        ]);
    }



}
