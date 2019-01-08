// JavaScript Document
var _box =$('#box');
var _interval=10000; //刷新间隔时间3秒
function gdb(){
	$("<dd style='height:5px;'><div class='fg-left'><span>There is no update</span></div><div class='fg-right'> <br> <h4 class='iop'>your story needs us</h4><a href='#'></a></div></dd>").prependTo('#box dl');
	var _first=$('#box dl dd:first');
	_first.animate({height: '+80px'}, "slow");
	var _last=$('#box dl dd:last');
	_last.remove();
	setTimeout(function(){
		gdb();
	},_interval);
}; 
gdb();