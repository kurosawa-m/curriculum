<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    public function goods(){
        return $this->belongTo('App\Goods');//'goods_id','id'省略
    }
}
