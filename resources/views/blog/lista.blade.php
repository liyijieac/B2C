<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My log</title>
	<link rel="stylesheet" href="/css/common.css">
	<style>

		.pagination{
			/* margin:0 auto; */
			display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}
			
	
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
	
	<!-- 主体 -->
	<div class="container">
		<h1>My log
			<a href="{{ route('write')}}">write a log</a>
			<a href="">Delete selected log</a>
		</h1>
		<br>
		<form action="">
			
			关键字： <input type="text" name="title">

			<input type="submit" name="" value="Search" >
		
		</form>
			
	
		<table class="data-list">
			<tr>
				<th width="30"><input type="checkbox"></th>
				<th>picture</th>
				<th>title
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="">↑</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="">↓</a>

				</th>
				<th width="140">Publication time</th>
				<th width="80">Jurisdiction</th>
				<th width="90">operation</th>
			</tr>
			
			<?php foreach($blogs as $v): ?>
			
			<tr>
				<td><input type="checkbox"></td>
				<td> <image style="width:70px" src="{{ Storage::url($v->image) }}" name="image"> </td>
				<td> {{ $v->title }}  </td>
				<td> {{ $v->created_at }} </td>
				<td> {{ $v->accessable }} </td>
				<td class="btn">
					<a href="{{ route('editblogs',['id'=>$v->id])}}">Edit</a>
					<a onclick="return confirm('Are you sure?');" href="{{ route('deleteblogs',['id'=>$v->id] )}}">Delete</a>
				</td>
			</tr>

			<?php endforeach; ?>

			<tr>

				<td colspan="6"> {{ $blogs->links() }} </td>
			
			</tr>
			
		</table>

		 
	</div>
</body>
</html>