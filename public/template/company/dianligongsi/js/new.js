function issToday(strn){
	var mm = new Date()
	var nowdate = mm.format("yyyy-MM-dd");
	//alert("nowdate=="+nowdate+"  shuru=="+strn);
	if(nowdate == strn) {
		document.write("<img src='/component/images/new.gif' height='12' align='absmiddle'/>");
	}else{
		document.write();
	}
}