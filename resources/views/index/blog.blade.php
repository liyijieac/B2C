<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log content</title>
	<link rel="stylesheet" href="/css/common.css">
</head>
<body>
<!-- 导航 -->
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
					<h1 class="title">{{ $blog->title }}</h1>
					<p class="author">Time：{{ $blog->created_at }} &nbsp;&nbsp; Author：{{ $blog->user->username }}</p>
				</div>
				<div class="con">
					{!! clean($blog->content) !!}
				</div>
				<p class="btns">（Read：{{ $blog->display }}）（<input id="ding" type="button" value="顶">：<span id="dingnum">{{ $blog->zan }}</span>   ）</p>
			</div>
			<!-- 评论 -->
			<div class="comment">
				<p class="people-count"></p>
                @if(session('id'))
                <form class="comment-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
					<div class="form-div"><textarea name="content" id="" cols="30" rows="10"></textarea></div>
					<div class="form-div"><input id="btn-comment" type="button" value="Comment"></div>
				</form>
                @else
                <p>After<a href="{{ route('login') }}">logging </a>in ，you can make a comment</p>
                @endif
				<div class="comment-list"></div>
			</div>
		</div>
		<div class="right">
            @include('index.top10')
		</div>
	</div>
</body>
</html>

<script src="/ueditor/third-party/jquery.min.js"></script>

<script>

	// 发表评论
$("#btn-comment").click(function(){

var content = $.trim($("textarea[name=content]").val());
var blog_id = $("input[name=blog_id]").val();
var _token = $("input[name=_token]").val();

if(content == "")
{
	alert("The content of the review can not be empty");
	return ;
}

if(content.length < 10)
{
	alert("The content of the review is at least ten characters");
	return ;
}


$.ajax({
	type:"POST",
	url:"/comment",
	data:{content:content,blog_id:blog_id,_token:_token},
	dataType:"json",
	success:function(data) {
		
		$("textarea[name=content]").val('');
	}
});


});




	//点赞 
	$("#ding").click(function(){

    $.ajax({
        type:"GET",
        url:"/ding/{{$blog->id}}",
        dataType:"json",
        success:function(data) {
            if(data.errno!=0)
            {
                
                if(data.errno==3)
                {
                    $("#ding").attr("disabled",true);
                }
                alert(data.errmsg);
            }
            else
            {
                $("#dingnum").html(  1*$("#dingnum").html() + 1  );
            }
        }
    });


});


$(window).on('scroll',function(){


var wh = $(window).height();

var sh = $(window).scrollTop();

var dh = $(document).height();


if(wh+sh+1 >= dh)
{
	load_data();
}

});




var ajax_get_url = "{{  route('comment.index', ['blog_id'=>$blog->id]) }}";
var allow=true; 

function load_data() {
if(!allow)
	return ;

allow=false;


var img = $("<img src='/images/loading2.gif'>");


$(".comment-list").append( img );


setTimeout(function(){

	
	$.ajax({
		type :"GET",
		url:ajax_get_url,
		dataType:"json",
		success:function(data){

			if(data.next_page_url == null)
			{
				
				$(window).off('scroll');
			}
			else
			{
				
				ajax_get_url = data.next_page_url;
			}

			
			var html="";
			$(data.data).each(function(k,v){
				html += '<div class="comment-item clearfix"> \
						<div class="left"> \
							<img src="/uploads/'+v.user.face+'" alt=""><br> \
							'+v.user.mobile+' \
						</div> \
						<div class="right"> \
							<p class="date">'+v.created_at+' 发表：</p> \
							<p class="con">'+htmlspecialchars(v.content)+'</p> \
						</div> \
					</div>';
			});

			
			$(".comment-list").append(html);

			
			allow=true;

			
			img.remove();

		}
	});

},500);

}

// 前端防XSS攻击
function htmlspecialchars(str) {
		  var s = "";
		  if (str.length == 0) return "";
		  for   (var i=0; i<str.length; i++)
		  {
			  switch (str.substr(i,1))
			  {
				  case "<": s += "&lt;"; break;
				  case ">": s += "&gt;"; break;
				  case "&": s += "&amp;"; break;
				  case " ":
					  if(str.substr(i + 1, 1) == " "){
						  s += " &nbsp;";
						  i++;
					  } else s += " ";
					  break;
				  case "\"": s += "&quot;"; break;
				  case "\n": s += "<br>"; break;
				  default: s += str.substr(i,1); break;
			  }
		  }
		  return s;
	  }


</script>