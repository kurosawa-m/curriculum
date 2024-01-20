<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;
use App\Buy;
use App\User;

// use Illuminate\Support\Facades\Auth;

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

        //
        $request->session()->put('goods', $goods)->file('image')->move(public_path() . "/img/tmp", $newImageName);
        $name = $request->name;
        // 拡張子つきでファイル名を取得
        $imageName = $request->file('image')->getClientOriginalName();
        // 拡張子のみ
        $extension = $request->file('image')->getClientOriginalExtension();
        // 新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;
        $request->file('image')->move(public_path() . "/img/tmp", $newImageName);
        $image = "/img/tmp/" . $newImageName;
        //

        return view('confirm_reg', [
            'goods' => $goods
        ]);
    }
      
    public function salesMgmt(Request $request){//事業者トップページから売上管理画面へ遷移
    
        $buys = new Buy;
        $all = $user->all()->toArray();
        return view('sales_mgmt',[
            'buys'=> $all,
        ]);
    }

}
