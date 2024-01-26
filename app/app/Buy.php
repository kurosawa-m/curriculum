<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{

    protected $table = 'buy';

    public function goods(){
        return $this->hasMany('App\Goods','id','goods_id');//'goods_id','id'省略
    }

    protected $fillable = ['goods_id','user_id','quantity'];

    public function addCarts($stock_id)
    {
        $user_id = Auth::id();
        $cart_add_info = Cart::firstOrCreate(['goods_id' => $goods_id,'user_id' => $user_id]);
    }

    public function showCart(){
        
        $user_id = Auth::id();
        $data['my_carts'] = $this->where('user_id',$user_id)->get();

        return $data;
    }
}
