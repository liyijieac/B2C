<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<script type="text/javascript">
	if(/Android (\d+\.\d+)/.test(navigator.userAgent)){
		var version = parseFloat(RegExp.$1);
		if(version>2.3){
			var phoneScale = parseInt(window.screen.width)/640;
			document.write('<meta name="viewport" content="width=640, minimum-scale = '+ phoneScale +', maximum-scale = '+ phoneScale +', target-densitydpi=device-dpi">');
		}else{
			document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
		}
	}else{
		document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
	}
	</script>
	<title>Your story</title>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="/css/common.css">

	<style>
		
		.sd {

			width:150px;
			height:150px;
			backgroundcolor:red;

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

	<br><br>

  <form action="{{ route('dostory') }}" method="POST" enctype="multipart/form-data">

  	{{ csrf_field() }}

	<div class="wrap">
		<div class="album-old">
			<div class="upload-btn btn-old"><input type="file" name="image" id=""></div>
			<div class="upload-img "></div>	
		</div>
		<div class="wan"></div>
		<div class="textarea">
			<textarea name="content">We focus on recording</textarea>
		</div>
		<button class="submit" value="Click submission"></button>
	</div>
	</form>
	<script type="text/javascript" src="js/zepto.min.js"></script>
	<script type="text/javascript" src="js/iscroll-zoom.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
