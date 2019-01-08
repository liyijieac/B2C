<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<script type="text/javascript">
	if(/Android (\d+\.\d+)/.test(navigator.userAgent)){
		var version = parseFloat(RegExp.$1);
		if(version>2.3){
			var phoneScale = parseInt(window.screen.width)/640;
			document.write('<meta name="viewport" content="width=640, minimum-scale = '+ phoneScale +', maximum-scale = '+ phoneScale +', target-densitydpi=device-dpi">');
		}else{
			document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
		}
	}else{
		document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
	}
	</script>
	<title></title>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrap result">
		
		<div class="album-new">
			<div class="upload-img"></div>
		</div>
		<div class="wan"></div>
		<div class="textarea">
		Please fill in your story, not more than 20 words
		</div>
		<div class="share"></div>
		<div class="share-tip"><img src="images2/tip.png"></div>
	</div>
	<script type="text/javascript" src="js/zepto.min.js"></script>
	<script>
		$(".share").click(function(){
			$(".share-tip").show();
		});
		$(".share-tip").click(function(){
			$(".share-tip").hide();
		});
	</script>
</body>
</html>
