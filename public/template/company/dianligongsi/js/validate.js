var validrule                  = new Object();
validrule.chinese              = /^([\u0391-\uFFE5|\s*]+$)?$/; 
validrule.english              = /^([a-zA-Z|\s*]+)?$/; 
validrule.number               = /^(\d*)?$/; 
validrule.integer              = /^([-\+]?\d{1,9})?$/;
validrule.float                = /^((([-\+]?\d+)(\.\d+))|(\.\d+)|(\d*))?$/;
validrule.double               = /^((([-\+]?\d+)(\.\d+))|(\.\d+)|(\d*))?$/;
validrule.string               = /^([^'<>"]+)?$/;
validrule.int                  = /^(\d{1,9})?$/; 
validrule.minusint             = /^(\-([1-9])(\d*))?$/;                  
validrule.date                 = /^((([1-9]\d{3})|([1-9]\d{1}))-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1]))?$/;  
validrule.time                 = /^((0[0-9]|1[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))?$/; 
validrule.datetime             = /^((([1-9]\d{3})|([1-9]\d{1}))-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1]) (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9]))?$/; 
validrule.datehm               = /^((([1-9]\d{3})|([1-9]\d{1}))-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1]) (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]))?$/;     
validrule.year                 = /^(\d{4})?$/; 
validrule.month                = /^([1-9]|0[1-9]|1[0-2])?$/;
validrule.day                  = /^([1-9]|0[1-9]|1[0-9]|2[0-9]|3[0-1])?$/;
validrule.postcode             = /^(\d{6})?$/;           
validrule.email                = /^(.+\@.+\..+)?$/;   
validrule.phone                = /^(\(\d{3}\))?(\(?(\d{3}|\d{4}|\d{5})\)?(-?)(\d+))?((-?)(\d+))?$/; 
validrule.mobiletel            = /^(013(\d{9})|13(\d{9}))?$/; 
validrule.ip                   = /^(([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5]))?$/;  
validrule.idcard               = /^(\d{15}|\d{18}|\d{17}X|\d{17}x)?$/; 

validrule.tabledefine          = /^(([A-Za-z])([A-Za-z0-9|_]){1,18})?$/; 
validrule.passwd               = /^[a-zA-Z]{1}([a-zA-Z0-9&#$\-@_]){7,11}$/;
 
validrule.NumAndStr            = /^([0-9a-zA-Z]+)?$/;  
validrule.LetterStr            = /^([a-zA-Z]+)?$/;
validrule.NumStr               = /^(\d*)?$/; 
 
//left trim
function ltrim( s ){return s.replace( /^\s*/, "" );}

//right trim
function rtrim( s ){return s.replace( /\s*$/, "" );}

//trim left & right
function trim( s ){return rtrim(ltrim(s));}

function removeElement(form,element){
    var length=form.elements.length;
    for(var i=length-1;i>=0;i--){
        var input=form.elements[i];
        if(input.name==element.name){
            form.removeChild(input);
        }
    }	
}

//对于一般控件的提交clone一个元素添加到提交表单，对于radio创建一个同名隐藏域保证原radio的选择状态不变
function doValidateInput(form,inputs)
{

    var frmLen=inputs.length;
    //对于每一个元素
    for(var i=0;i<frmLen;i++) 
    {
        //remove submitform's element
        removeElement(form,inputs[i]);
        _elem=inputs[i];
        //alert(_elem.name);
        //为空检查                
        if(_elem.getAttribute("vmode") != null && _elem.getAttribute("vmode") == "not null") 
        {
                if(trim(_elem.value).length == 0) 
                {
                        alert(_elem.getAttribute("vdisp")+"不能为空!")
                        try{_elem.focus();}catch(e){;}
                        return false;
                }
        }		 
        //类型检查                  
        if(_elem.getAttribute("vtype") == null) 
        {
                continue;
        }
        if(_elem.getAttribute("vtype")=="none")
        {         
           thePat = "";
           strFormatInfo = "";
        }
        if(_elem.getAttribute("vtype")=="chinese")
        {       
           thePat = validrule.chinese;
           strFormatInfo = "中文";
        }
        if(_elem.getAttribute("vtype")=="english")
        {       
           thePat = validrule.english;
           strFormatInfo = "英文字母";
        }
        if(_elem.getAttribute("vtype")=="number")
        {       
           thePat = validrule.number;
           strFormatInfo = "阿拉伯数字";
        }
        if(_elem.getAttribute("vtype")=="integer")
        {       
           thePat = validrule.integer;
           strFormatInfo = "整数";
        }
        if(_elem.getAttribute("vtype")=="float")
        {       
           thePat = validrule.float;
           strFormatInfo = "浮点数";
        }
        if(_elem.getAttribute("vtype")=="double")
        {       
           thePat = validrule.double;
           strFormatInfo = "实数";
        }
        if(_elem.getAttribute("vtype")=="string")
        {       
           thePat = validrule.string;
           strFormatInfo = "不含特殊符合的字符串";
        }
        if(_elem.getAttribute("vtype")=="int")         
        {       
           thePat = validrule.int;
           strFormatInfo = "正整数";
        }
        if(_elem.getAttribute("vtype")=="minusint")         
        {       
           thePat = validrule.minusint;
           strFormatInfo = "负整数，比如-123";
        }
        if(_elem.getAttribute("vtype")=="date")         
        {       
           thePat = validrule.date;
           strFormatInfo = "日期型，比如 2004-08-12";
        }
        if(_elem.getAttribute("vtype")=="time")         
        {       
           thePat = validrule.time;
           strFormatInfo = "时间型，比如08:37:29";
        }
        if(_elem.getAttribute("vtype")=="datehm")         
        {       
           thePat = validrule.datehm;
           strFormatInfo = "日期时分型，比如 2004-08-12 12:25";
        }	      	 
        if(_elem.getAttribute("vtype")=="datetime")         
        {       
           thePat = validrule.datetime;
           strFormatInfo = "日期时间型，比如2004-08-12 08:37:29";
        }
        if(_elem.getAttribute("vtype")=="year")         
        {       
           thePat = validrule.year;
           strFormatInfo = "年代格式，比如 2005";
        }
        if(_elem.getAttribute("vtype")=="month")         
        {       
           thePat = validrule.month;
           strFormatInfo = "月份格式，比如 08";
        }
        if(_elem.getAttribute("vtype")=="day")         
        {       
           thePat = validrule.day;
           strFormatInfo = "日子格式，比如 14";
        } 
        if(_elem.getAttribute("vtype")=="postcode")         
        {       
           thePat = validrule.postcode;
           strFormatInfo = "邮编，比如 100001";
        }	      	
        if(_elem.getAttribute("vtype")=="email")         
        {       
           thePat = validrule.email;
           strFormatInfo = "请输入正确的email地址";
        }
        if(_elem.getAttribute("vtype")=="phone")         
        {       
           thePat = validrule.phone;
           strFormatInfo = "电话号码格式，比如xxx-xxxxxxxx";
        }
        if(_elem.getAttribute("vtype")=="mobiletel")         
        {       
           thePat = validrule.mobiletel;
           strFormatInfo = "手机号码格式，比如xxxxxxxxxxx";
        }	      	
        if(_elem.getAttribute("vtype")=="ip")       
        {       
           thePat = validrule.ip;
           strFormatInfo = "请输入正确的ip地址";
        }	
        if(_elem.getAttribute("vtype")=="passwd")
        {
           thePat = validrule.passwd;
           strFormatInfo = "必须包含字母长度8到12个字符，比如abcd1234";
        }
        if(_elem.getAttribute("vtype")=="idcard")       
        {       
           thePat = validrule.idcard;
           strFormatInfo = "身份证号码，比如15位或者18位数字";
        }
        if(_elem.getAttribute("vtype")=="tabledefine")   
        {       
           thePat = validrule.tabledefine;
           strFormatInfo = "abc_defgf";
        }

        if(_elem.getAttribute("vtype")=="LetterStr")
        {       
           thePat = validrule.LetterStr;
           strFormatInfo = "纯字母字符串";
        }
        if(_elem.getAttribute("vtype")=="NumAndStr")
        {       
           thePat = validrule.NumAndStr;
           strFormatInfo = "数字和字母字符串";
        }
        if(_elem.getAttribute("vtype")=="NumStr")
        {       
           thePat = validrule.NumStr;
           strFormatInfo = "纯数字组成的字符串";
        }

        _elem.voperate = _elem.getAttribute("voperate");
	    _elem.to = _elem.getAttribute("to");
	    _elem.msg = _elem.getAttribute("msg");
	    _elem.max = _elem.getAttribute("max");
	    _elem.min = _elem.getAttribute("min");
	    _elem.extendname = _elem.getAttribute("extendname");
	    _elem.regexp = _elem.getAttribute("regexp");
	    _elem.vtextarea = _elem.getAttribute("vtextarea");
		_elem.maxlength = _elem.getAttribute("maxlength");

        var gotIt = null; 
        if(thePat!="")
        {
                gotIt = thePat.exec(_elem.value);
        }	      	 
        if(gotIt == null) 
        {
                alert(_elem.getAttribute("vdisp")+"输入不合法,格式应为："+strFormatInfo);
                try{_elem.focus();}catch(e){;}
                return false;
        }

        if(_elem.getAttribute("voperate")=="repeat")         
        {       	      	  

           if(_elem.value != document.getElementById(_elem.to).value)
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        }

        if(_elem.getAttribute("voperate")=="rangeint")         
        {  

           if(parseInt(_elem.value) > parseInt(_elem.max) || parseInt(_elem.value) < parseInt(_elem.min))
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        }

        if(_elem.getAttribute("voperate")=="rangestr")         
        {  	      		      	      	      	  
           if(_elem.value > _elem.max || _elem.value < _elem.min)
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        }  

        if(_elem.getAttribute("voperate")=="comparestr")         
        {       	      	  
           if(_elem.value <= document.getElementById(_elem.to).value)
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        }

        if(_elem.getAttribute("voperate")=="largestr")         
        {       	      	  
           if(_elem.value <= document.getElementById(_elem.to).value)
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        } 

        if(_elem.getAttribute("voperate")=="largeequalstr")         
        {       	      	  
           if(_elem.value < document.getElementById(_elem.to).value)
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        } 

        if(_elem.getAttribute("voperate")=="compareint")         
        {       	      	  
           if(parseInt(_elem.value) <= parseInt(document.getElementById(_elem.to).value))
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        } 

        if(_elem.getAttribute("voperate")=="largeint")         
        {       	      	  
           if(parseInt(_elem.value) <= parseInt(document.getElementById(_elem.to).value))
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        } 

        if(_elem.getAttribute("voperate")=="largeequalint")         
        {       	      	  
           if(parseInt(_elem.value) < parseInt(document.getElementById(_elem.to).value))
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        } 

        if(_elem.getAttribute("voperate")=="extend")         
        {       	      	    
           if((_elem.value).lastIndexOf(_elem.extendname)<=0)
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        } 

        if(_elem.getAttribute("voperate")=="custom")         
        {       	      	    
           if(!RegExp(_elem.regexp,"g").test(_elem.value))
           {
                 alert(_elem.msg);
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        } 
        if(_elem.vtextarea=="yes")         
        {       	      	    
           var ivaluelength=_elem.value.length;
           var imaxlength=_elem.maxlength;
           if(ivaluelength>=imaxlength)
           {
                 alert(_elem.getAttribute("vdisp")+"输入的值长度太长超过了"+imaxlength+"个字符");
                 try{_elem.focus();}catch(e){;}
                 return false;
           }
        }
    }
    //append element to the submitform
    for(var i=0;i<frmLen;i++) 
    {
        var _t=inputs[i].cloneNode("Clone node only");
        //alert(inputs[i].type);
        if(inputs[i].type=="radio"||inputs[i].type=="checkbox"){
            //radio element should be convert text input to keep oraginal element checked
            if(inputs[i].checked){                
                var input_hid=document.createElement("input");
                input_hid.name=inputs[i].name;
                input_hid.value=inputs[i].value;
                input_hid.style.display="none";
                form.appendChild(input_hid);   
            }
        }else if(inputs[i].type=="select-one"){           
                var input_hid=document.createElement("input");
                input_hid.name=inputs[i].name;                
                input_hid.value=inputs[i].options[inputs[1].options.selectedIndex].value;
                input_hid.style.display="none";
                form.appendChild(input_hid);   

        }        else{
                _t.style.display="none";
                form.appendChild(_t);
        }
  
    }
    return true;
}

function doValidate( vform ) 
{
	var elems = vform.elements;
	var frmLen = elems.length;
	var thePat = "";
	var strFormatInfo = "";
	//对于每一个FROM元素
	for(var i=0;i<frmLen;i++) 
	{
		var _elem = elems[i];
		//为空检查                
		if(_elem.getAttribute("vmode") != null && _elem.getAttribute("vmode") == "not null") 
		{
			if(trim(_elem.value).length == 0) 
			{
				alert(_elem.getAttribute("vdisp")+"不能为空!")
				try{_elem.focus();}catch(e){;}
				return false;
			}
		}		 
                //类型检查                  
		if(_elem.getAttribute("vtype") == null) 
		{
			continue;
		}
		thePat="";
	      	if(_elem.getAttribute("vtype")=="none")
	      	{         
	      	   thePat = "";
	      	   strFormatInfo = "";
	      	}
	      	if(_elem.getAttribute("vtype")=="chinese")
	      	{       
	      	   thePat = validrule.chinese;
	      	   strFormatInfo = "中文";
	      	}
	      	if(_elem.getAttribute("vtype")=="english")
	      	{       
	      	   thePat = validrule.english;
	      	   strFormatInfo = "英文字母";
	      	}
	      	if(_elem.getAttribute("vtype")=="number")
	      	{       
	      	   thePat = validrule.number;
	      	   strFormatInfo = "阿拉伯数字";
	      	}
	      	if(_elem.getAttribute("vtype")=="integer")
	      	{       
	      	   thePat = validrule.integer;
	      	   strFormatInfo = "整数";
	      	}
	      	if(_elem.getAttribute("vtype")=="float")
	      	{       
	      	   thePat = validrule.float;
	      	   strFormatInfo = "浮点数";
	      	}
	      	if(_elem.getAttribute("vtype")=="double")
	      	{       
	      	   thePat = validrule.double;
	      	   strFormatInfo = "实数";
	      	}
	      	if(_elem.getAttribute("vtype")=="string")
	      	{       
	      	   thePat = validrule.string;
	      	   strFormatInfo = "不含特殊符合的字符串";
	      	}
	      	if(_elem.getAttribute("vtype")=="int")         
	      	{       
	      	   thePat = validrule.int;
	      	   strFormatInfo = "正整数";
	      	}
	      	if(_elem.getAttribute("vtype")=="minusint")         
	      	{       
	      	   thePat = validrule.minusint;
	      	   strFormatInfo = "负整数，比如-123";
	      	}
	      	if(_elem.getAttribute("vtype")=="date")         
                {       
	      	   thePat = validrule.date;
	      	   strFormatInfo = "日期型，比如 2004-08-12";
	      	}
	      	if(_elem.getAttribute("vtype")=="time")         
	      	{       
	      	   thePat = validrule.time;
	      	   strFormatInfo = "时间型，比如08:37:29";
	      	}
	      	if(_elem.getAttribute("vtype")=="datehm")         
                {       
	      	   thePat = validrule.datehm;
	      	   strFormatInfo = "日期时分型，比如 2004-08-12 12:25";
	      	}	      	 
	      	if(_elem.getAttribute("vtype")=="datetime")         
	      	{       
	      	   thePat = validrule.datetime;
	      	   strFormatInfo = "日期时间型，比如2004-08-12 08:37:29";
	      	}
                if(_elem.getAttribute("vtype")=="year")         
	      	{       
	      	   thePat = validrule.year;
	      	   strFormatInfo = "年代格式，比如 2005";
	      	}
	      	if(_elem.getAttribute("vtype")=="month")         
	      	{       
	      	   thePat = validrule.month;
	      	   strFormatInfo = "月份格式，比如 08";
	      	}
                if(_elem.getAttribute("vtype")=="day")         
	      	{       
	      	   thePat = validrule.day;
	      	   strFormatInfo = "日子格式，比如 14";
	      	} 
	      	if(_elem.getAttribute("vtype")=="postcode")         
	      	{       
	      	   thePat = validrule.postcode;
	      	   strFormatInfo = "邮编，比如 100001";
	      	}	      	
	      	if(_elem.getAttribute("vtype")=="email")         
	      	{       
	      	   thePat = validrule.email;
	      	   strFormatInfo = "电子邮件格式";
	      	}
	      	if(_elem.getAttribute("vtype")=="phone")         
	      	{       
	      	   thePat = validrule.phone;
	      	   strFormatInfo = "电话号码格式，比如xxx-xxxxxxxx";
	      	}
	      	if(_elem.getAttribute("vtype")=="mobiletel")         
	      	{       
	      	   thePat = validrule.mobiletel;
	      	   strFormatInfo = "手机号码格式，比如xxxxxxxxxxx";
	      	}	      	
	      	if(_elem.getAttribute("vtype")=="ip")       
	      	{       
	      	   thePat = validrule.ip;
	      	   strFormatInfo = "机器ip地址格式，比如 xxx.xxx.xxx.xxx";
	      	}	    
                if(_elem.getAttribute("vtype")=="passwd")
                {
                    thePat = validrule.passwd;
                    strFormatInfo = "必须包含字母且长度不少于8个字符，比如abcd1234";
                }
	      	if(_elem.getAttribute("vtype")=="idcard")       
	      	{       
	      	   thePat = validrule.idcard;
	      	   strFormatInfo = "身份证号码，比如15位或者18位数字";
	      	}
	      	if(_elem.getAttribute("vtype")=="tabledefine")   
	      	{       
	      	   thePat = validrule.tabledefine;
	      	   strFormatInfo = "abc_defgf";
	      	}
	      	 
	      	if(_elem.getAttribute("vtype")=="LetterStr")
	      	{       
	      	   thePat = validrule.LetterStr;
	      	   strFormatInfo = "纯字母字符串";
	      	}
	      	if(_elem.getAttribute("vtype")=="NumAndStr")
	      	{       
	      	   thePat = validrule.NumAndStr;
	      	   strFormatInfo = "数字和字母字符串";
	      	}
	      	if(_elem.getAttribute("vtype")=="NumStr")
	      	{       
	      	   thePat = validrule.NumStr;
	      	   strFormatInfo = "纯数字组成的字符串";
	      	}
	      	
			_elem.voperate = _elem.getAttribute("voperate");
		    _elem.to = _elem.getAttribute("to");
		    _elem.msg = _elem.getAttribute("msg");
		    _elem.max = _elem.getAttribute("max");
		    _elem.min = _elem.getAttribute("min");
		    _elem.extendname = _elem.getAttribute("extendname");
		    _elem.regexp = _elem.getAttribute("regexp");
		    _elem.vtextarea = _elem.getAttribute("vtextarea");
			_elem.maxlength = _elem.getAttribute("maxlength");
	      		      	
	      	var gotIt = null; 
	      	if(thePat!="")
	      	{
	      	        gotIt = thePat.exec(_elem.value);
	      	        if(gotIt == null) 
	  	      	    {
		  	      		alert(_elem.getAttribute("vdisp")+"输入不合法,格式应为："+strFormatInfo);
		  	      		try{_elem.focus();}catch(e){;}
		  	      		return false;
	  	      	    }
	      	}	      	 
	      	
	      	
	      	if(_elem.getAttribute("voperate")=="repeat")         
	      	{       	      	  
	      	   
	      	   if(_elem.value != document.getElementById(_elem.to).value)
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	}
	      	
	      	if(_elem.getAttribute("voperate")=="rangeint")         
	      	{  
	      		      	      	      	  
	      	   if(parseInt(_elem.value) > parseInt(_elem.max) || parseInt(_elem.value) < parseInt(_elem.min))
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	}
	      	
	      	if(_elem.getAttribute("voperate")=="rangestr")         
	      	{  	      		      	      	      	  
	      	   if(_elem.value > _elem.max || _elem.value < _elem.min)
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	}  

                if(_elem.getAttribute("voperate")=="comparestr")         
	      	{       	      	  
	      	   if(_elem.value <= document.getElementById(_elem.to).value)
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	}
	      	
	      	if(_elem.getAttribute("voperate")=="largestr")         
	      	{       	      	  
	      	   if(_elem.value <= document.getElementById(_elem.to).value)
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 
	      	
	      	if(_elem.getAttribute("voperate")=="largeequalstr")         
	      	{       	      	  
	      	   if(_elem.value < document.getElementById(_elem.to).value)
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 
	      	
	      	if(_elem.getAttribute("voperate")=="compareint")         
	      	{       	      	  
	      	   if(parseInt(_elem.value) <= parseInt(document.getElementById(_elem.to).value))
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 
	      	
	      	if(_elem.getAttribute("voperate")=="largeint")         
	      	{       	      	  
	      	   if(parseInt(_elem.value) <= parseInt(document.getElementById(_elem.to).value))
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 
	      	
	      	if(_elem.getAttribute("voperate")=="largeequalint")         
	      	{       	      	  
	      	   if(parseInt(_elem.value) < parseInt(document.getElementById(_elem.to).value))
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 

                if(_elem.getAttribute("voperate")=="extend")         
	      	{       	      	    
	      	   if((_elem.value).lastIndexOf(_elem.extendname)<=0)
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 
	      	
	      	if(_elem.getAttribute("voperate")=="custom")         
	      	{       	      	    
	      	   if(!RegExp(_elem.regexp,"g").test(_elem.value))
	      	   {
	      	         alert(_elem.msg);
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 
	      	
	      	
	      	if(_elem.vtextarea=="yes")         
	      	{       	      	    
	      	   var ivaluelength=_elem.value.length;
	      	   var imaxlength=_elem.maxlength;
	      	   if(ivaluelength>=imaxlength)
	      	   {
	      	         alert(_elem.getAttribute("vdisp")+"输入的值长度太长超过了"+imaxlength+"个字符");
	      	         try{_elem.focus();}catch(e){;}
	      		 return false;
	      	   }
	      	} 
	      	
	}  
	return true;
}
