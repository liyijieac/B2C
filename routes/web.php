<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// 主页
Route::get('/', 'IndexController@index')->name('index');

// 日志内容
Route::get('/blog/{id}', 'IndexController@blog')->name('blog.content');



//用户注册
Route::get('/regist', 'RegistController@regist')->name('regist');
Route::post('/doregist', 'RegistController@doregist')->name('doregist');


// 用户登录
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@dologin')->name('dologin');



// 必须登录才能访问的中间件
Route::middleware(['login'])->group(function() {

    // 我的日志
    Route::get('/myblogs', 'BlogController@lista')->name('myblogs');

    // 日志编辑
    Route::get('/editblogs/{id}', 'BlogController@edit')->name('editblogs');
    Route::post('/editblogs/{id}', 'BlogController@doedit')->name('doeditblogs');

    // 日志删除
    Route::get('/deleteblogs/{id}', 'BlogController@delete')->name('deleteblogs');

    // 写日志
    Route::get('/write' , 'BlogController@write')->name('write');
    Route::post('/dowrite', 'BlogController@dowrite')->name('dowrite');

    // 退出
    Route::get('/logout', 'LoginController@logout')->name('logout');

    // 点赞
    Route::get('/ding/{blog_id}', 'BlogController@ding')->name('ding');

    // 评论
    Route::post('/comment', 'CommentController@doadd')->name('comment.doadd');

    // 相册
    Route::get('/camera', 'ImageController@camera')->name('camera');
    Route::post('/docamera', 'ImageController@docamera')->name('docamera');


    // 故事
    Route::get('/story', 'StoryController@index')->name('story');
    Route::post('/dostory', 'StoryController@dostory')->name('dostory');
    Route::get('/list', 'StoryController@lista')->name('list');
    

});


// 生成验证码
Route::get('/captcha', 'CaptchaController@make')->name('captcha');

//验证码
Route::get('/sendmobilecode', 'RegistController@sendmobilecode')->name('ajax-send-modbile-code');


// ajax显示最新日志
Route::get('/ajax/newblogs', 'IndexController@ajaxnewblogs')->name('ajax.newblogs');

// 显示评论
Route::get('/comment/{blog_id}', 'CommentController@index')->name('comment.index');

// 游戏
Route::get('/game', 'GameController@index')->name('game');

// 显示游戏
Route::get('/demo', 'GameController@demo')->name('demo');
Route::get('/demo1', 'GameController@demo1')->name('demo1');
Route::get('/demo2', 'GameController@demo2')->name('demo2');
Route::get('/demo3', 'GameController@demo3')->name('demo3');



// 错误页面
Route::get('/error', 'IndexController@errora')->name('error');



// 关于
Route::get('/about', 'IndexController@abouta')->name('about');

// 头像
Route::post('/face','FaceController@face')->name('face');


