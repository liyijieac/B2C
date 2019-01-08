<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>设置头像</title>
	<link rel="stylesheet" href="css/common.css">
	<style>
		
		.img-container {

			width:240px;
			height:240px;
			float:left;

		}

		.img-container #pre_image {

			width:100%;

		}

		.img-preview {

			float:left;
			overflow:hidden;
			margin-left:20px;

		}

		.preview-lg {

			width:240px;
			height:240px;

		}

		.preview-md {

			width:80px;
			height:80px;

		}

		.preview-sm {

			width:35px;
			height:35px;

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
                <li class="f"><a href="{{ route('face') }}">Face</a></li>
                <li class="f"><a href="{{ route('story') }}"><span>Your</span>story</a></li>
        @if(session('id'))
                <li class="p"><img src="/images1/02.jpg" alt=""></li>
                <li class="i"><span id="username">{{ session('mobile') }}</span></li>
                <li class="j"><a href="{{ route('logout') }}">Go out</a></li>
            @else
                <li class="g"><a href="{{ route('regist') }}">Regist</a></li>
                <li class="h"><a href="{{ route('login') }}">Login</a></li>
            @endif
			
</ul>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>设置头像</h1>

			@if(session('bgface'))

				<img src="{{ Storage::url(session('bgface')) }}" alt="">
			
			@else 
				<img src="/images/face.jpg" alt="">
			
			@endif

		<form action="{{ route('face') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
		
			<div class="form-div">
				<input type="file" name="face">
			</div>

			<div class="img-container">
				<img src="" alt="" id="pre_image">
			</div>

			<div class="docs-preview clearfix">

				<div class="img-preview preview-lg"></div>
				<div class="img-preview preview-md"></div>
				<div class="img-preview preview-sm"></div>

			</div>
			
			<input type="hidden" name="x">
			<input type="hidden" name="y">
			<input type="hidden" name="w">
			<input type="hidden" name="h">

			<div class="form-div">
				<input type="submit" value="确认">
			</div>


		</form>
	</div>

	<script src="/ueditor/third-party/jquery.min.js"></script>
	<link rel="stylesheet" href="/cropper/cropper.min.css">
</body>
</html>
<script src="/cropper/cropper.min.js"></script>

<script>

		var preImg = $("#pre_image");

		var x = $("input[name=x]");
		var y = $("input[name=y]");
		var w = $("input[name=w]");
		var h = $("input[name=h]");

		$("input[name=face]").change(function() {

			preImg.cropper("destroy");

			var url = getObjectUrl( this.files[0] );

			console.log(url);

			preImg.attr('src',url);

			preImg.cropper({

				aspectRatio:1,

				preview:'.img-preview',

				viewMode:3,

				crop:function(event) {

					x.val( event.detail.x );

					y.val( event.detail.x );

					w.val( event.detail.width );

					h.val( event.detail.height );

				}

			});

		});

		function getObjectUrl(file) {

			var url = null;

			if(window.createObjectURL != undefined) {

				url = window.creatObjectURl(file);

			}else if(window.URL != undefined) {

				url = window.URL.creatObjectURL(file);

			}else if(window.webkitURL != undefined) {

				url = window.webkitURL.creatObjectURL(file);

			}

			return url

		}

</script>

