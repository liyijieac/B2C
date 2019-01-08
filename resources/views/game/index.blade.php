<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/common.css">
    <title>小游戏</title>
    <style>
    
        .adc {

            width:500px;
            height:300px;
            position: relative;
            left:121px;
            top:53px;

        }

        .abc {

            width:500px;
            height:300px;
            position: relative;
            left:720px;
            top:-247px;

        }
    
    </style>
</head>
<body>
<!-- 导航 -->
<div class="header">
		<ul class="menu">
        <li class="a"><a href="{{ route('index') }}"><span class="active">Home</a></li>
                <li class="b"><a href="{{ route('camera') }}">Album</a></li>
				<li class="d"><a href="{{ route('myblogs') }}">Journal</a></li>
                <li class="f"><a href="{{ route('list') }}">Story</a></li>
                <li class="f"><a href="{{ route('game') }}">Game</a></li>
                <li class="f"><a href="{{ route('story') }}"><span>Your</span>story</a></li>
        @if(session('id'))
                <li class="p"><img src="/images1/02.jpg" alt=""></li>
                <li class="i"><span id="username">{{ session('mobile') }}</span></li>
                <li class="j"><a href="{{ route('logout') }}">Go out</a></li>
            @else
                <li class="g"><a href="{{ route('regist') }}">registration</a></li>
                <li class="h"><a href="{{ route('login') }}">Login</a></li>
            @endif
			
</ul>
	</div>

    <div class="adc">

        <a href="{{ route('demo3') }}"><img  width="500px" height="300px" src="/images/2.jpg" alt=""></a>  
        <a href="{{ route('demo2') }}"><img width="500px" height="300px" src="/images/02.png" alt=""></a> 

    </div>

    <div class="abc">

        <a href="{{ route('demo1') }}"><img width="500px" height="300px" src="/images/03.png" alt=""></a> 
        <a href="{{ route('demo') }}"><img width="500px" height="300px" src="/images/4.png" alt=""></a>

    </div>
    
</body>
</html>