<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->increments('id');  // id
            $table->timestamps();      // created_at 、 updated_at
            $table->string('username')->comment('用户名');
            $table->unsignedBigInteger('mobile')->comment('手机号');
            $table->char('password',60)->comment('密码');
            $table->engine='innodb';
            $table->comment='用户表';

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
