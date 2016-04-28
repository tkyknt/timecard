            ckary = new Array();
            
            function setck(){
            ckary[0] = document.forms[0].name.value;
            ckary[1] = document.forms[0].comment.value;

            exp=new Date();
            exp.setTime(exp.getTime()+10000*60*60*24*1);
            ckstr = escape(ckary[0]);
            i = 1;
            while (ckary[i]){
		ckstr += "%00" + escape(ckary[i]);
		i++;
                }
            document.cookie = "ASH_jsc=" + ckstr + "; expires=" + exp.toGMTString();
            }

            function getck(){
            cklng = document.cookie.length;
            ckary = document.cookie.split("; ");
            ckstr = "";
            i = 0;
            while (ckary[i]){
		if (ckary[i].substr(0,8) == "ASH_jsc="){
			ckstr = ckary[i].substr(8,ckary[i].length);
			break;
		}
		i++;
            }
            ckary = ckstr.split("%00");
            if (ckary[0]) document.forms[0].name.value = unescape(ckary[0]);
            if (ckary[1]) document.forms[0].comment.value = unescape(ckary[1]);
            }
            
            
            ckary3 = new Array();
            function setck3(){
            ckary3[0] = document.forms[0].gname.value;
            ckary3[1] = document.forms[0].gcomment.value;
            exp3=new Date();
            exp3.setTime(exp3.getTime()+10000*60*60*24*1);
            ckstr3 = escape(ckary3[0]);
            i = 1;
            while (ckary3[i]){
		ckstr3 += "%00" + escape(ckary3[i]);
		i++;
                }
            document.cookie = "ASH3_jsc=" + ckstr3 + "; expires=" + exp3.toGMTString();
            }

            function getck3(){
            cklng3 = document.cookie.length;
            ckary3 = document.cookie.split("; ");
            ckstr3 = "";
            i = 0;
            while (ckary3[i]){
		if (ckary3[i].substr(0,9) == "ASH3_jsc="){
			ckstr3 = ckary3[i].substr(9,ckary3[i].length);
			break;
		}
		i++;
            }
            ckary3 = ckstr3.split("%00");
            if (ckary3[0]) document.forms[0].gname.value = unescape(ckary3[0]);
            if (ckary3[1]) document.forms[0].gcomment.value = unescape(ckary3[1]);
            }
            
        var Nowymdhms = new Date();
        var NowYear = Nowymdhms.getFullYear();
        var NowMon = Nowymdhms.getMonth() + 1;
        var NowDay = Nowymdhms.getDate();
        var NowWeek = Nowymdhms.getDay();
        var NowHour = Nowymdhms.getHours();
        var NowMin = Nowymdhms.getMinutes();
        var Week = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        if(NowHour < 10){
        	NowHour = "0"+NowHour;
        }
        if(NowMin < 10){
            NowMin = "0"+NowMin;
        }
        
        
        function naiset(flag1,flag2)
            {
            document.forms[0].time2.disabled = flag1;
            document.forms[0].chikoku.disabled = flag2;
            document.forms[0].time.disabled = flag2;
            document.forms[0].gname.disabled = flag2;
            document.forms[0].gcomment.disabled = flag2;
            document.forms[0].comment.required = flag2;
            }

        function gaiset(flag1,flag2)
            {
            document.forms[0].time2.disabled = flag2;
            document.forms[0].chikoku.disabled = flag2;
            document.forms[0].time.disabled = flag2;
            document.forms[0].gname.disabled = flag2;
            document.forms[0].gcomment.disabled = flag2;
            document.forms[0].comment.required = flag1;
            }       
            
         function restset(flag1,flag2)
            {
            document.forms[0].time2.disabled = flag1;
            document.forms[0].chikoku.disabled = flag2;
            document.forms[0].time.disabled = flag2;
            document.forms[0].gname.disabled = flag2;
            document.forms[0].gcomment.disabled = flag2;
            document.forms[0].comment.required = flag2;
            }