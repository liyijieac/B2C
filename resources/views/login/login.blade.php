<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User login</title>
	<link rel="stylesheet" href="/css/common.css">
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
		<h1>User login</h1>
		<form action="{{ route('dologin') }}" method="post">
		{{csrf_field()}}

			<div class="form-div"><input type="text" name="mobile" placeholder="Cell-phone number">

				@if($errors->has('mobile'))
				<p>
					{{$errors->first('mobile')}}
				</p>
				@endif
			
			</div>
			
			<div class="form-div"><input type="password" name="password" placeholder="Password">

				@if($errors->has('password'))
				<p>
					{{$errors->first('password')}}
				</p>
				@endif

			</div>

			<div class="form-div">
				<input type="text" name="captcha" placeholder="Verification Code">
				<img onclick="this.src='{{ route('captcha') }}?'+Math.random()"  src="{{ route('captcha') }}" alt="">
			</div>

			<div class="form-div"><a href="{{route('regist')}}">No account number? Click registration</a></div>
			<div class="form-div"><input type="submit" value="Login"></div>
		</form>
	</div>
</body>
</html>