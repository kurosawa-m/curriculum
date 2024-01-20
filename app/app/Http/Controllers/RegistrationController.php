<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;

class RegistrationController extends Controller
{

    public function registrationGoods(Request $request){//商品登録
                
        // セッションから商品情報を取得
        // $goods = $request->session()->get('goods');
        // データベースに保存
        // dd($request);

        $reg_goods = new Goods;
        $reg_goods->name = $request->name;
        $reg_goods->image = $request->image;
        $reg_goods->content = $request->content;
        $reg_goods->amount = $request->amount;
        $reg_goods->shop_id = 1;
        $reg_goods->save();

        // レコードを挿入したときのIDを取得
        $lastInsertedId = $reg_goods->id;

        // ディレクトリを作成
        if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
            mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
        }

        // 一時保存から本番の格納場所へ移動
        rename(public_path() . "/img/tmp/" . $request->image, public_path() . "/img/" . $lastInsertedId . "/" . $request->image);
        
        // 一時保存の画像を削除
        File::cleanDirectory(public_path() . "/img/tmp");

        return redirect('/shop_toppage');
    }

}
