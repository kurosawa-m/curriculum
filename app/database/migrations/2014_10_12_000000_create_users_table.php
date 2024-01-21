<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','10');
            $table->string('email')->unique();
            $table->string('password','255');
            $table->string('fullname','10')->nullable();
            $table->string('tel','20');
            $table->string('postcode','10');
            $table->string('address','50');
            $table->tinyInteger('role')->default(0);
            $table->tinyInteger('del_flg')->default(0);
            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('fullname','10')->nullable()->change();
            $table->string('tel','20')->nullable()->change();
            $table->string('postcode','10')->nullable()->change();
            $table->string('address','50')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
