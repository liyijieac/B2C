<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');   // id
            $table->timestamps();       // created_at    updated_at

            $table->string('title')->comment('标题');
            $table->longText('content')->comment('内容');
            $table->unsignedInteger('display')->default(0)->comment('日志浏览量');
            $table->unsignedInteger('zhan')->default(0)->comment('点赞人数');
            $table->enum('accessable',['public','protected','private'])->default('public')->comment('访问权限');

            $table->comment='日志表';
            $table->engine='innodb';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
