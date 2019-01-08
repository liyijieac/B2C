<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About me</title>
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
	<div class="container clearfix">
		<div class="left">
			<div class="art-con">
				<div class="head">
					<h1 class="title">We only do the best, focus on the record</h1>
					<p class="author">时间：2018-06-05  &nbsp;&nbsp; 作者：摩羯座</p>
				</div>
				<div class="con">
					<p>
						In the first half of 2017, we spent half a year settling other things that did not belong to us at all.
					</p>

					<br>

					<p>
					We used our knowledge to write a website that is not like a website. We have experienced many difficulties and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; encountered countless BUG.
					</p>
					
					<br>

					<p>
						But we all know that the most fearless thing for young people is to bear hardships, to eat bitterness, and to serve &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; others.
					</p>
					
					<br>

					<p>
						A lot of people are sure to wonder why I can't delete the story, why I can't delete the photos I upload, because we only focus on recording the beauty and the harm he brought to you.
					</p>
					
					<br>

					<p>

						If he brings you good, please keep him / her. If he brings you harm, you must remember him / her. He taught you to grow up

					</p>
					
				</div>
				<p class="btns">Thank you for coming for us to make progress together</p>
			</div>
			
		
	</div>
</body>
</html>