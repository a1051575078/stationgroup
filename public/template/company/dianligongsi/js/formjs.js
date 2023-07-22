function doLogin(){
    var loginForm = document.forms["form_login"];
    var inputs=new Array();
    var input1=document.getElementsByName("AgentID");
    if(input1.length){
        inputs.push(input1[0]);
    }
    var input2=document.getElementsByName("AgentPWD");
    if(input2.length){
        inputs.push(input2[0])
    }
    var input3=document.getElementsByName("CheckCode");
    if(input3.length){
        inputs.push(input3[0]);
    }
    if(doValidateInput(loginForm,inputs)){
        loginForm.submit();
    }
}
function doRegist(){
    alert("注册新用户！");
}
function doWebSearch(){
    var formsubmit = document.forms["form_websearch"];
    var inputs=new Array();
    var input1=document.getElementsByName("q");
    var input2=document.getElementsByName("sitesid");
    if(stripscriptcheck(input1[0].value))
    	{
    	 if(input1.length){
    	        inputs.push(input1[0]);
    	    }
    	    if(input2.length){
    	        inputs.push(input2[0]);
    	    }

    	    if(doValidateInput(formsubmit,inputs)){            
    	        formsubmit.submit();
    	    }
    	}
    else{
    	alert("包含特殊字符");
    }
    
   
}
function stripscriptcheck(s) {
    var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）&;—|{}【】‘；：”“'。，、？]");
    if(pattern.test(s))
    	{
    		return false;
    	}
    else
    	{
    	return true;
    	}
    //        var rs = "";
//    for (var i = 0; i < s.length; i++) {
//        rs = rs + s.substr(i, 1).replace(pattern, '');
//    }
}

function stripscript(s) {
    var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）&mdash;—|{}【】‘；：”“'。，、？]")
        var rs = "";
    for (var i = 0; i < s.length; i++) {
        rs = rs + s.substr(i, 1).replace(pattern, '');
    }
    return rs;
}


function refreshImg(){
var codeimg=document.all.imgagevalidatecode;
codeimg.src="<%=request.getContextPath()%>/servlet/validatecode.do?rand="+Math.random();
}
//对调查投票的js验证，没有选择不允许提交
function researchFormSubmit(check_id){
    var researchForm =document.forms["form_research"];
    researchForm.TID.value=check_id;
    if(!researchForm){ alert("没找到提交表单!");return ;}
    var flag=false;
    var checkIdObj =document.getElementsByName(check_id);
    for(var i=0;i<checkIdObj.length;i++){
        removeElement(researchForm,checkIdObj[i]);
        if(checkIdObj[i].checked){
            flag=true;
            break;
        }
    }if(!flag){
        alert("请选择投票选项！");
        return  ;
    }else{
        doValidateInput(researchForm,checkIdObj);
        researchForm.submit();
    }
}

function popUpHtml(strhtml){
    window.open(strhtml,'','fullscreen=no,statusbar=no,titlebar=yes,resizable=yes,scrollbars=yes');
}
