<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>square</title>
	<link rel="stylesheet" href="/css/common.css">
    <!-- <link rel="stylesheet" href="/css/styles.css"> -->
    
    
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
    
	<!-- <div></div> -->
	<!-- 主体 -->
	<div class="container clearfix">
		<div class="left"></div>
		<div class="right">
            @include('index.top10')
			
		</div>
    </div>
</body>
</html>

<script src="/ueditor/third-party/jquery.min.js"></script>

<script type="text/javascript" src='js/p5.min.js'></script>
<script>

var disallow_load = true;
var ajax_blog_url = "{{ route('ajax.newblogs') }}";


$(window).on('scroll',function(){

    if(disallow_load)
        return ;

    var dh = $(document).height();
    
    var wh = $(window).height();
    
    var sh = $(window).scrollTop();

    console.log( dh   ,  wh    , sh );

    if(wh+sh >= dh)
    {
        
        disallow_load = true;

        load_data();


    }


});

function load_data() {
    
    var img = $("<img src='/images/loading3.gif'>");
    
    $(".left").append(img);

    setTimeout(function(){

        $.ajax({
            type:"GET",
            url:ajax_blog_url,
            dataType:"json",
            success:function(data) {
                
                if(data.next_page_url == null)
                {
                    
                    $(window).off('scroll');
                }
                else
                {
                    
                    ajax_blog_url = data.next_page_url;
                }
                
                var html = "";
                
                $(data.data).each(function(k,v){

                    html += '<div class="art-list"><a target="_blank" href="/blog/'+v.id+'"><p class="title">'  +  v.title  +   '</p><p class="img"><img src="http://192.168.13.54/uploads/'  +  v.image +   '" alt=""></p></a><p class="btns">'  +  v.created_at  +   ' （阅读：'  +  v.display  +   '）（顶：'  +  v.zhan  +   '）（作者：' + v.mobile + ' ）</p></div>';
                });
                
                $(".left").append( html );
                
                disallow_load=false;
                
                img.remove();
            }
        });

    }, 2000);
}

load_data();



</script>