$(document).ready(function (){
	$('#img-play').maiPlayer({speedSwitch: 5000, playerWidth: 680});
	
	var pig = document.getElementById("pig");
	//加上这句话是为了 pdf转换成图片之后显示的问题
	if((pig==null)==false)
	{
		$(".txtcon").removeClass("txtcon").addClass("txtcon1");
	}
});
