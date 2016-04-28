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
            function setck2(){
            ckary2[0] = document.forms[0].g1name.value;
            ckary2[1] = document.forms[0].g1time.value;
            ckary2[2] = document.forms[0].g1comment.value;
            ckary2[3] = document.forms[0].g2name.value;
            ckary2[4] = document.forms[0].g2time.value;
            ckary2[5] = document.forms[0].g2comment.value;
            ckary2[6] = document.forms[0].g3name.value;
            ckary2[7] = document.forms[0].g3time.value;
            ckary2[8] = document.forms[0].g3comment.value;
            ckary2[9] = document.forms[0].g4name.value;
            ckary2[10] = document.forms[0].g4time.value;
            ckary2[11] = document.forms[0].g4comment.value;            
            exp2=new Date();
            exp2.setTime(exp2.getTime()+10000*60*60*24*1);
            ckstr2 = escape(ckary2[0]);
            i = 1;
            while (ckary2[i]){
		ckstr2 += "%00" + escape(ckary2[i]);
		i++;
                }
            document.cookie = "ASH2_jsc=" + ckstr2 + "; expires=" + exp2.toGMTString();
            }

            function getck2(){
            cklng2 = document.cookie.length;
            ckary2 = document.cookie.split("; ");
            ckstr2 = "";
            i = 0;
            while (ckary2[i]){
		if (ckary2[i].substr(0,9) == "ASH2_jsc="){
			ckstr2 = ckary2[i].substr(9,ckary2[i].length);
			break;
		}
		i++;
            }
            ckary2 = ckstr2.split("%00");
            if (ckary2[0]) document.forms[0].g1name.value = unescape(ckary2[0]);
            if (ckary2[1]) document.forms[0].g1time.value = unescape(ckary2[1]);
            if (ckary2[2]) document.forms[0].g1comment.value = unescape(ckary2[2]);
            if (ckary2[3]) document.forms[0].g2name.value = unescape(ckary2[3]);
            if (ckary2[4]) document.forms[0].g2time.value = unescape(ckary2[4]);
            if (ckary2[5]) document.forms[0].g2comment.value = unescape(ckary2[5]);           
            if (ckary2[6]) document.forms[0].g3name.value = unescape(ckary2[6]);
            if (ckary2[7]) document.forms[0].g3time.value = unescape(ckary2[7]);
            if (ckary2[8]) document.forms[0].g3comment.value = unescape(ckary2[8]);
            if (ckary2[9]) document.forms[0].g4name.value = unescape(ckary2[9]);
            if (ckary2[10]) document.forms[0].g41time.value = unescape(ckary2[10]);
            if (ckary2[11]) document.forms[0].g41comment.value = unescape(ckary2[11]);            
            }
            
        var Nowymdhms　=　new Date();
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
 cdate = NowYear + "-" + NowMon + "-" + NowDay;

