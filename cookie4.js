             ckary = new Array();
            function setck(){
            ckary[0] = document.forms[0].name.value;
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
            }
            
            ckary3 = new Array();
            function setck_d(){
                ckary3[0] = document.forms[0].name.value;
                ckary3[1] = document.forms[0].date.value;
                ckary3[2] = document.forms[0].time.value;
                ckary3[3] = document.forms[0].time2.value;
                ckary3[4] = document.forms[0].comment.value;
                ckary3[5] = document.forms[0].time_t.value;
                ckary3[6] = document.forms[0].comment_t.value;
                ckary3[7] = document.forms[0].gname.value;
                ckary3[8] = document.forms[0].gcomment.value;
                exp=new Date();
                exp.setTime(exp.getTime()+10000*60*60*24*1);
                ckstr3 = escape(ckary3[0]);
                i = 1;
                while (ckary3[i]){
		ckstr3 += "%00" + escape(ckary3[i]);
		i++;
                }
                document.cookie = "ASH3_jsc=" + ckstr3 + "; expires=" + exp.toGMTString();
            }

            function getck_d(){
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
            if (ckary3[0]) document.forms[0].name.value = unescape(ckary3[0]);
            if (ckary3[1]) document.forms[0].date.value = unescape(ckary3[1]);
            if (ckary3[2]) document.forms[0].time.value = unescape(ckary3[2]);
            if (ckary3[3]) document.forms[0].time2.value = unescape(ckary3[3]);
            if (ckary3[4]) document.forms[0].comment.value = unescape(ckary3[4]);
            if (ckary3[5]) document.forms[0].time_t.value = unescape(ckary3[5]);
            if (ckary3[6]) document.forms[0].comment_t.value = unescape(ckary3[6]);
            if (ckary3[7]) document.forms[0].gname.value = unescape(ckary3[7]);
            if (ckary3[8]) document.forms[0].gcomment.value = unescape(ckary3[8]);
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
        
        
        function naiset()
            {
            document.forms[0].time.readOnly = false;
            document.forms[0].time2.readOnly = true;
            document.forms[0].chikoku.readOnly = false;
            document.forms[0].gname.readOnly = false;
            document.forms[0].gcomment.readOnly = false;
            }

        function gaiset()
            {
            document.forms[0].time.readOnly = false;
            document.forms[0].time2.readOnly = false;
            document.forms[0].chikoku.readOnly = false;
            document.forms[0].gname.readOnly = false;
            document.forms[0].gcomment.readOnly = false;
            }       
            
         function restset()
            {
            document.forms[0].time.readOnly = true;
            document.forms[0].time2.readOnly = true;
            document.forms[0].chikoku.readOnly = true;
            document.forms[0].gname.readOnly = true;
            document.forms[0].gcomment.readOnly = true;
            } 