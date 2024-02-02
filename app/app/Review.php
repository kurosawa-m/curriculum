<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function goods(){
        return $this->hasMany('App\Goods','id','goods_id');//'goods_id','id'省略
    }

    protected $table = 'review';

    protected $fillable = ['goods_id','user_id','title','comment'];

}
