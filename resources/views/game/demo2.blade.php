﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <script src="js/jquery.min.js"></script>
    <style type="text/css" media="screen">
    *{
        margin: 0;
        padding: 0;
    }
    img{
        border:0;
    }
    ol, ul ,li{list-style: none;}
    body{
        background:#272323;
    }
        .wrap{
            width:810px;
            height:600px;
            margin: 100px auto;
            border:2px solid #FFC400;
            padding:0 1px 1px 0;
            position: relative;
            background:#0B0B0B;

        }

        .snake_wrap{
            width:810px;
            height:600px;
            position: absolute;
            top:0px;
            left:0px;
            overflow: hidden;
        }
        .snake_wrap li{
            width:14px;
            height:14px;
            background:#FFC400;
            float: left;
            margin: 1px 0 0 1px;
            position: absolute;
        }

        .food{
            width:14px;
            height:14px;
            background:#FFC400;
            position: absolute;
            top:30px;
            left:45px;
        }
        .Data,.explain{
            width:200px;
            height:605px;
            background:#0b0b0b;
            position: absolute;
            top:-2px;
            left:-210px;
        }
        .score{
            height:70px;
            text-align:center;
            line-height: 70px;
            font-size:40px;
            font-weight: bold;
            color: #ffc400;
        }

        .Data ul{
            width:190px;
            height:494px;
            border-top:2px solid #ffc400;
            padding:5px;
            overflow: hidden;
        }

        .Data ul li{
            width:100%;
            color: #ffc400;
            line-height:26px;
            padding:3px 0 3px;
            overflow:hidden;
        }

        .Data ul li+li{
            border-top:1px dashed rgba(255,196,0,0.2);
        }

        .Data ul li span{
            display: block;
            float: left;
            overflow: hidden;
            white-space:nowrap;
            text-overflow:ellipsis;

        }
        .Data ul li span.NO{
            width:40px;
        }
        .Data ul li span.name{
            width:100px;
        }
        .Data ul li span.scoreList{
            float: right;
            text-align:right;
            width:50px;
        }

        .clear_data{
            color:#ffc400;
            border-top:1px solid #ffc400;
            text-align:center;
            padding:5px 0;
            cursor:pointer;
        }

        .clear_data:hover{
            text-decoration:underline;
        }

        .zhez{
            width:100%;
            height:100%;
            position: absolute;
            top:0;
            left:0;
            background:rgba(0,0,0,0.5);
            display: none;
            text-align:center;
        }

        .start{
            display: block;
        }

        .zhez span{
            padding:15px 250px;
            margin: 20px;
            border:3px solid #D4A509;
            line-height: 40px;
            font-size:22px;
            background:#0b0b0b;
            color: #ffc400;
            border-radius:10px;
            cursor:pointer;
        }

        .zhez span:hover{
            background:#D4A509;
            color: #fff;
        }

        .start input{
            display: block;
            width:200px;
            height:50px;
            margin: 210px auto 100px;
            padding:0 20px;
            outline:none;
        }

        .over p{
            font-weight:bold;
            font-size:100px;
            color:rgba(255,196,0,1);
            padding:150px 0 100px;
        }

        .explain{
            left:auto;
            right:-210px;
            color:#ffc400;
            padding:10px;
            width:180px;
            height:584px;
            font-size:14px;
            line-height:22px;
        }

        .explain h3{
            font-size:16px;
            padding:5px 0 10px;
            margin-bottom:10px;
            border-bottom: 1px solid #ffc400;
        }
        .explain p{padding:3px 0;}

    </style>
    <script>
        $(function(){

            $('.game_start').on('click',function(){
                $(this).closest('.start').stop().hide();
                mySnakeFn();
            })

            $('.game_over').on('click',function(){
                $('.start').stop().show();
                $(this).closest('.over').stop().hide();
                $('input[name=your_name]').val('');
            })

            $('.clear_data').on('click',function(){
                $('.ranking_list').empty();
            })

        })

        function mySnakeFn(){

            //全局变量对相
            var myVar = {
                    //移动控制变量
                    del_x:-15,
                    del_y:0,
                    //初始长度
                    myscore:0,
                    //移动速度
                    speed:100,
                    //计时器
                    itimes:null
                }


            // 初始位置

            ;(function(){
                var arr_snake = [['300px','390px'],['300px','405px'],['300px','420px']];
                $('.snake_wrap').empty();
                $('.snake_wrap').append('<li></li><li></li><li></li>')
                $('.snake_wrap li').each(function(value){
                    $(this).css({'top':arr_snake[value][0],'left':arr_snake[value][1]})
                })
            })(jQuery);

            //键盘控制--上下左右暂停
            ;(function(){

                //暂停判定
                var stop = true;

                $(document).keydown(function(event) {
                    switch(event.keyCode){
                        //空格 暂停
                        case 32:stop ? clearInterval(myVar.itimes) : run();
                                stop = !stop;
                                break;
                        //左
                        case 37:directionKey(-15,0,true);
                                break;
                        //上
                        case 38:directionKey(0,-15,false);
                                break;
                        //右
                        case 39:directionKey(15,0,true);
                                break;
                        //下
                        case 40:directionKey(0,15,false);
                                break;
                    }
                });
            })(jQuery);

            //方向判断
            function directionKey(y1,y2,bour){
                if(!myVar.del_x == bour){
                    myVar.del_x = y1;
                    myVar.del_y = y2;
                }
            }

            function run(){
                //计时器，每speed时刷新一次
                myVar.itimes = setInterval(function(){
                    //获取当前食物位置
                    var food_top = $('.food').position().top;
                    var food_left = $('.food').position().left;
                    //设置新增蛇头坐标
                    var header_top = $('.snake_wrap li').eq(0).position().top + myVar.del_y;
                    var header_left = $('.snake_wrap li').eq(0).position().left + myVar.del_x;
                    //当前蛇头颜色重置
                    $('.snake_wrap li').eq(0).css({'background': '#FFC400'});
                    //新增蛇头，并赋予样式
                    $('.snake_wrap').prepend('<li></li>');
                    $('.snake_wrap li').eq(0).css({'left':header_left + 'px','top':header_top + 'px','background':'#fff'})
                    //移除最后一节蛇尾
                    $('.snake_wrap li:last').remove();

                    //判断蛇是否吃到食物
                    if((header_left == (food_left - 1)) && (header_top == (food_top - 1))){
                        var last_top = $('.snake_wrap li:last').position().top;
                        var last_left = $('.snake_wrap li:last').position().left;
                        $('.snake_wrap').append('<li></li>');
                        $('.snake_wrap li:last').eq(0).css({'left':last_left + 'px','top':last_top + 'px'})

                        //刷新食物
                        foodRandom();

                        //蛇身长度
                        myVar.myscore++;
                        scoreFn(myVar.myscore);

                        //每加长5，速度提升10
                        if(!(myVar.myscore%5) && myVar.speed > 10){
                            clearInterval(myVar.itimes);
                            myVar.speed -= 10;
                            run();
                        }
                    }

                    //边界判断
                    borderDetection(header_top,header_left);
                    //自撞判断
                    selfDetection(header_top,header_left);
                },myVar.speed)
            }
            run();

            //分数
            function scoreFn(x){
                $('.score').html(x)
            }

            //食物
            function foodRandom(){
                var t = 40;
                var x = 54;
                var y = 0;
                var repeat = false;
                var top = parseInt(Math.random() * (t - y) + y);
                var left = parseInt(Math.random() * (x - y) + y);

                //判断食物与蛇身坐标是否重合
                $('.snake_wrap li').each(function() {
                     if($(this).position().left == left && $(this).position().top == top){
                        foodRandom();
                    }else{
                        repeat = true;
                    }
                });

                //如果食物没在蛇身上，定位食物
                if(repeat){
                    $('.food').css({'top':top*15 + 1 + 'px','left':left*15 + 1 + 'px'});
                }
            }
            foodRandom();

            // 边界判定
            function borderDetection(HT,HL){
                if(HT<0 || HT > 585 || HL < 0 || HL >795){
                    clearInterval(myVar.itimes);
                    gameOver();
                    rankingList()
                }
            }

            //自撞判定
            function selfDetection(HT,HL){
                //从第二节开始，坐标是否与蛇头重合
                $('.snake_wrap li:gt(0)').each(function(index, val) {
                    var this_top = $(this).position().top;
                    var this_left = $(this).position().left;
                     if( HL == this_left && HT == this_top ){
                        clearInterval(myVar.itimes);
                        gameOver();
                        rankingList()
                     }
                })
            }

            //游戏结束
            function gameOver(){
                $('.over').show();
            }

            //获取用户昵称
            function yourName(){
                if($.trim($('input[name=your_name]').val()) != ''){
                    return $('input[name=your_name]').val();
                }else{
                    return '游客';
                }
            }

            //排行榜
            function rankingList(){
                //添加新的记录
                var new_ranking = '<li><span class="NO">'+ (1 +parseInt($('.ranking_list li').length)) +'</span><span class="name">' +yourName()+ '</span><span class="score_list">' +myVar.myscore+ '</span></li>';
                //排行榜容器
                var ranking_list = $('.ranking_list');

                //如果排行榜中有记录就进行排序，如果为空就直接添加
                if(ranking_list.has('li').length>0){
                    //记录长度
                    var li_len = $('.ranking_list li').length
                    //冒泡排序，把新的记录排列到对应的位置上
                    for(var i = 0; i < li_len; i++){

                        if(parseInt($('.ranking_list li').eq(i).children('span.score_list').html()) < parseInt(myVar.myscore)){
                            $(new_ranking).insertBefore($('.ranking_list li').eq(i)).hide().slideDown();
                            break;
                        }else if(i == li_len - 1){
                            $(new_ranking).appendTo(ranking_list).hide().slideDown();
                        }
                    }
                }else{
                    $(new_ranking).appendTo(ranking_list).hide().slideDown();
                }



                //重新添加排号序列
                $.each($('.ranking_list li'),function(index,value){
                    $(this).children('.NO').html($(this).index() +1)
                })
            }

        }
    </script>
</head>
<body>
    <div class="wrap">
        <ul class="snake_wrap">
            <li class="light"></li>
            <li class="light"></li>
            <li class="light"></li>
        </ul>
        <span class="food"></span>
        <div class="Data">
            <div class="score">0</div>
            <ul class="ranking_list">
            </ul>
            <p class="clear_data">清除记录</p>
        </div>

        <div class="start zhez">
            <input type="text" name="your_name" placeholder="输入您的昵称">
            <span class="game_start">开始游戏</span>
        </div>
        <div class="over zhez">
            <p><i>GAME OVER</i></p>
            <span class="game_over">重新开始</span>
        </div>
        <div class="explain">
            <h3>操作指南</h3>
            <p>输入游戏昵称（不输入默认“游客”）。</p>
            <p>点击“开始游戏”按钮启动游戏。</p>
            <p>使用键盘方向键（← ↑ → ↓）键来控制方向，空格键暂停。</p>
            <p>游戏开始后，每成功吃到食物，分数加1，身体会加长一块，随着蛇身的加长，速度也会上升。</p>
            <p>当蛇头跃出边界或者撞到自身时，游戏结束。</p>
        </div>
    </div>
</body>
</html>