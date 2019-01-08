<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<title>Story list</title>

<link rel="stylesheet" type="text/css" href="css/style1.css"/>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
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

	.iop {

		position:relative;
		height:55px;
		left:-37px;
		top:25px;

	}
</style>

<!--图片弹出层样式 必要样式-->
<link rel="stylesheet"  href="/css/zoom.css" media="all" />

<script type="text/javascript" src="js/jquery3.min.js"></script>
<script type="text/javascript" src="js/index1.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/zoom.min.js"></script>

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
<div class="fg-box" id="box">
	<div class="fg-line"></div>
	<dl>    
        
        @foreach ($memory as $m)
    
        <dd>
			<div class="fg-left"><span>{{ $m->created_at }}</span></div>
			
            <div class="fg-right">
			<br>
            <div class="iop">{{ $m->content }}</div>
            <a href="#"></a>
            </div>
        </dd>

        @endforeach
       
    </dl>
</div>
<div class="gallery">	 
	

        
        @foreach ($memory as $m)

        <li><a href="{{ Storage::url($m->image) }}"><img width="85px" height="73px" src="{{ Storage::url($m->image) }}" /></a></li>
        
        @endforeach


 <div class="clear"></div>
</div>
</body>
</html>