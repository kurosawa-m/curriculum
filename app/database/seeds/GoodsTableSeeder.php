<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')->insert([
            'name' => 'サンプル1',
            'amount' => '1000',
            'content' => 'サンプル1商品説明文',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
