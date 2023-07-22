//当页面加载完成后执行
//window.onload = function(){
	//加载城市列表
	//refreshCity();
	//query(1);
//};

var x=10;
var y=20;
function showDetail(e,o){
	if(o){
		var info = $(o);
		$('#OUTLET_NAME').html(info.attr('OUTLET_NAME'));
		$('#OUTLET_ADDRESS').html(info.attr('OUTLET_ADDRESS'));
		$('#OUTLET_TYPE').html(info.attr('OUTLET_TYPE')==0?'自建':'代理');
		$('#SERVICE_LINE').html(info.attr('SERVICE_LINE'));
		$('#BUSI_HOURS').html(info.attr('BUSI_HOURS'));
		$('#BUSI_SCOPE').html(info.attr('BUSI_SCOPE'));
	}
	e = e? e: window.event; 
	$("#tooltip").css({"top": ($(document).scrollTop()+e.clientY+y) + "px","left": (e.clientX+x) + "px"}).toggle(); //设置X Y坐标， 并且显示
}
//刷新城市下拉菜单
function refreshCity() {
	var locationid = document.form1.city.value
	$.ajax({
	   type: "POST",
	   //url: basepath+"/sites/main/ajax_refreshCity.jsp",
	   url: "/component/ajax_refreshcity.action",
	   dataType: 'text',  
	   data: "randomNum=" + Math.random()*100,
	   success: function(result){
			//如果返回为空，则只显示默认“请选择”
			if(result!="0"){
				//将下拉菜单置空
				document.form1.city.options.length = 0;
				var strs = new Array();
				var strsa = new Array();
				//去除返回值中的空格
				result=result.replace( /^\s*/, '');
				strs = result.split(";");
				var opt = new Option("请选择...",""); 
				document.form1.city.options.add(opt); 
				for (i=0;i<strs.length;i++ )    
				{    
					strsa = strs[i].split(",");
					var opt = new Option(strsa[1],strsa[0]); 
					document.form1.city.options.add(opt); 
				}
			}else {
				document.form1.city.options.length = 0;
				var opt = new Option("请选择...",""); 
				document.form1.city.options.add(opt); 
			}
	   }
	});
}
//刷新地区下拉菜单，代码功能注释同上
function refreshArea() {
	var locationid = document.form1.city.value
	$.ajax({
	   type: "POST",
	   //url: basepath+"/sites/main/ajax_refreshArea.jsp",
	   url: "/component/ajax_refresharea.action",
	   dataType: 'text',  
	   data: "id=" + locationid + "&randomNum=" + Math.random()*100,
	   success: function(result){
			if(result!="0"){
				document.form1.area.options.length = 0;
				var strs = new Array();
				var strsa = new Array();
				result=result.replace( /^\s*/, '');
				strs = result.split(";");
				var opt = new Option("请选择...",""); 
				document.form1.area.options.add(opt); 
				for (i=0;i<strs.length;i++ )    
				{    
					strsa = strs[i].split(",");
					var opt = new Option(strsa[1],strsa[0]); 
					document.form1.area.options.add(opt); 
				}
			}else {
				document.form1.area.options.length = 0;
				var opt = new Option("请选择...",""); 
				document.form1.area.options.add(opt); 
			}
	   }
	});
}

//进行查询操作
function query(pageNum) {
	var cityId = $('#city').val();
	var areaId = $('#area').val();
	var keys = $('#keys').val();
	$('#pageNum').val(pageNum);
	/*if(cityId==""){
		alert("请选择城市！");
		form1.city.focus();
		return false;
	}*/
	//分割查询条件，计算查询条件个数
	var strs = keys.split(" ");
	var times = 0;
	for (i=0;i<strs.length;i++ ){ 
		if(strs[i]!=""){
			times++;
		}
	}
	if(times>5){
		alert("请不要使用过多条件进行查询");
		form1.keys.focus();
		return false;
	}
	$.ajax({
	   type: "POST",
	   //url: basepath+"/sites/main/ajax_query.jsp",
	   url: "/component/ajax_querysalesnetwork.action",
	   dataType: 'text',  
	   data: "cityId=" + cityId+"&areaId=" + areaId+"&keys=" + keys+"&pageNum=" + pageNum+"&pageNum1=" + Math.random()*10,
	   success: function(result){
			//去空格
			result=result.replace( /^\s*/, '');
			//返回值中用&&分割两部分，前半部分为查询结果集，后半部分为查询页码数
			var results = result.split("&&");
			if(results[0]!=0){
				var records = new Array();
				var values = new Array();
				//每一条记录用";"分割
				var records = results[0].split(";");
				var tab = document.getElementById("table1") ;
				//默认在页面上显示四条记录
				for(i=0;i<3;i++){  
					//如果不够四条记录，将缺少部分隐藏
					if(i<records.length){
						//记录中字段用","分割
						values = records[i].split(",");
						tab.rows.item(i+1).cells[0].innerHTML=values[0];
						tab.rows.item(i+1).cells[1].innerHTML=values[1];
						//地址SPAN 添加ID为d+序列数
						//document.getElementById("d"+i).innerHTML = values[2];
						tab.rows.item(i+1).cells[2].innerHTML = values[2];
						var td3 = $(tab.rows.item(i+1).cells[3]) ;
						var info = $('<span onmouseover="showDetail(event,this)" onmouseout="showDetail(event)" class="xx">详细</span>');
						info.attr({
							OUTLET_NAME:values[2],
							BUSI_SCOPE:values[3],
							OUTLET_ADDRESS:values[4],
							BUSI_HOURS:values[5],
							SERVICE_LINE:values[6],
							OUTLET_TYPE:values[7]
						});
						td3.empty().append(info);
						tab.rows.item(i+1).cells[4].innerHTML=values[4];
						if((i%2)==1){
							$(tab.rows.item(i+1)).addClass('even');
						}
					}else{
						$(tab.rows.item(i+1)).removeClass('even');
						tab.rows.item(i+1).cells[0].innerHTML="";
						tab.rows.item(i+1).cells[1].innerHTML="";
						tab.rows.item(i+1).cells[2].innerHTML="";
						tab.rows.item(i+1).cells[3].innerHTML="";
						tab.rows.item(i+1).cells[4].innerHTML="";
					}
				}
			}else{
				var tab = document.getElementById("table1") ;
				for(i=0;i<3;i++){  
					$(tab.rows.item(i+1)).removeClass('even');  
					tab.rows.item(i+1).cells[0].innerHTML="";
					tab.rows.item(i+1).cells[1].innerHTML="";
					tab.rows.item(i+1).cells[2].innerHTML="";
					tab.rows.item(i+1).cells[3].innerHTML="";
					tab.rows.item(i+1).cells[4].innerHTML="";
				}
			}
			//将页码值赋给隐藏域
			form1.pageNum.value = results[1];
	   }
	});
}
//查看下一页
function nextPage(){
	var num = parseInt($('#pageNum').val());
	//将页码加1，执行查询
	query(num+1);
}
//查看上一页
function frontPage(){
	var num = parseInt($('#pageNum').val());
	//将页码减1，执行查询
	query(num-1);
}