<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>write a log</title>
	<link rel="stylesheet" href="css/common.css">
	<link href="ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
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
	<!-- 主体 -->
	<div class="container">
		<h1>write a log</h1>
		

		<form action="{{ route('dowrite') }}" method="post" enctype="multipart/form-data">

			{{ csrf_field() }}

			<div>
			
				<input type="file" name="image">
			
			</div>

			<div class="form-div">
				<input style="width: 100%;" type="text" name="title" placeholder="Input title">
				@if($errors->has('title'))
				<p class="error">
					{{$errors->first('title')}}
				</p>
				@endif
			</div>
			<div class="form-div">
				<textarea id="content" name="content"></textarea>
				@if($errors->has('content'))
				<p class="error">
					{{$errors->first('content')}}
				</p>
				@endif
			</div>
			<div class="form-div"><input name="accessable" value="public" type="radio" checked> Public</div>
			<div class="form-div"><input name="accessable" value="protected" type="radio"> Ptotected</div>
			<div class="form-div"><input name="accessable" value="private" type="radio"> Private</div>
			
			<div class="form-div"><input type="submit" value="Publish"></div>
		</form>


	</div>
</body>
</html>
<script type="text/javascript" src="ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
UM.getEditor('content', {
	initialFrameWidth:"100%",
	initialFrameHeight:"500"
});
</script>