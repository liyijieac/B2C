<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mphoto</title>

<style type="text/css">
	* {

		margin:0;
		padding:0;
		list-style-type:none;

	}

	body {

		overflow-y:scroll;
		font-family:"HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, sans-serif;background:#f4f4f4;
		padding:0;
		margin:0;

	}

	a,a:hover {

		border:none;
		text-decoration:none;

	}

	img,a img {

		border:none;

	}

	.clear {

		clear:both;

	}

	.zoomed > .gallery {

		-webkit-filter:blur(3px);
		filter:blur(3px);

	}

	.gallery {

		width:800px;
		margin:20px auto;

	}

	.gallery li {

		float:left;
		margin:10px;
		width:100px;
		height:100px;

	}

	.gallery li:nth-child(6n) {

		padding-right:0;

	}

	.gallery li a,.gallery li img {

		float:left;

		padding-left:20px;
		
	}
</style>

<!--图片弹出层样式 必要样式-->
<link rel="stylesheet"  href="/css/zoom.css" media="all" />
<link rel="stylesheet" href="/css/common.css">
<style>

	

	.asd {

		position: relative;
		left:-150px;
		top:-5px;

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

<div class="gallery">	 
	

		<form action="{{ route('docamera') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}

			<div>

				<input class="asd" type="file" name="image">
			
			</div>

			
			@foreach ($image as $v)
	
			<li><a href="{{ Storage::url($v->image) }}"><img width="85px" height="73px" src="{{ Storage::url($v->image) }}" /></a></li>
		    
			@endforeach
			
			
			<div class="form-div"><input type="submit" value="Publish"></div>
			
		</form>
	    	 
	

	
	 <div class="clear"></div>
</div>

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/zoom.min.js"></script>

</body>
</html>