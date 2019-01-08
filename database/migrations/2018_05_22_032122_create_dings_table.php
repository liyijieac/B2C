<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 记录用户赞过的日志（以下两条代表1这个用户点过3和4这两个日志）
        //       user_id      blog_id
        //         1             3
        //         1             4

        Schema::create('dings', function (Blueprint $table) {

            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedInteger('blog_id')->comment('日志ID');
            // 为表添加一个联合索引
            $table->index('user_id','blog_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dings');
    }
}
