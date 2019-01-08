<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Regist</title>
	<link rel="stylesheet" href="css/common.css">
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
		<h1>Use Regist</h1>
		
		<form action="{{ route('doregist') }}" method="POST" enctype="multipart/form-data">
			
			{{ csrf_field() }}

			<div>
			
				<input type="file" name="image">
		
			</div>

			<div class="form-div"><input type="text" name="username" placeholder="Username">

				@if($errors->has('username'))
				<p>
					{{$errors->first('username')}}
				</p>
				@endif

			</div>

			<div class="form-div"><input type="text" name="mobile" placeholder="Cell-phone number"><input id="btn-send" type="button" value="Click to get the verification code"></div>

			<div class="form-div"><input type="text" name="mobile_code" placeholder="Please enter the verification code"></div>
						
			<div class="form-div"><input type="password" name="password" placeholder="Cipher (no less than six bits)">
			
				@if($errors->has('password'))
				<p>
					{{$errors->first('password')}}
				</p>
				@endif
			
			</div>
			
			<div class="form-div"><input type="password" name="password_confirmation" placeholder="Reconfirm the password">
			
				@if($errors->has('password_confirm'))
				<p>
					{{$errors->first('password_confirm')}}
				</p>
				@endif
			
			</div>
			
			<div class="form-div"><input type="checkbox" name="protocol"> 《Agreement on registration》</div>
			
			<div class="form-div"><input type="submit" value="Register"></div>
		</form>
	</div>
</body>
</html>
<script src="/ueditor/third-party/jquery.min.js"></script>
<script>

	var seconds = 60;

	var si;

	$("#btn-send").click(function() {

		var mobile = $("input[name=mobile]").val();

		$.ajax({

			type:"GET",
			url:"{{ route('ajax-send-modbile-code') }}",
			data:{mobile:mobile},
			success:function(data){

				$("#btn-send").attr('disabled',true);

				si = setInterval(function() {

					seconds--;
					if(seconds==0) {

						$("#btn-send").attr('disabled',false);
						seconds=60;
						$("#btn-send").val("点击获取验证码");
						clearInterval(si);

					}else {

						$("#btn-send").val("请在"+(seconds)+"秒里面进行验证");

					}

				},1000);

			}

		});

	});

</script>

Array.prototype.distinct = function(){
 var arr = this,
  result = [],
  i,
  j,
  len = arr.length;
 for(i = 0; i < len; i++){
  for(j = i + 1; j < len; j++){
   if(arr[i] === arr[j]){
    j = ++i;
   }
  }
  result.push(arr[i]);
 }
 return result;
}
var arra = [1,2,3,4,4,1,1,2,1,1,1];
arra.distinct();    //返回[3,4,2,1]