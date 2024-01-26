<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = ['name','content','amount'];

    // public function Buy(){
    //     return $this->hasMany('App\Buy');
    // }

}
