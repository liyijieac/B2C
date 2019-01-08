<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string('content',500)->comment('内容');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedInteger('blog_id')->comment('日志ID');
            // 创建索引（因为取评论时要根据 blog_id 来查询评论表，所以我们为这个字段建索引，查询速度更快）
            $table->index('blog_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
