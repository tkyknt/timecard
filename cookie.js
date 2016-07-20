            function setck(){
            ckary = document.forms[0].name.value;
            exp=new Date();
            exp.setTime(exp.getTime()+365000*60*60*24*1);
            ckstr = escape(ckary);
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
            
            ckary2 = new Array();
            function setck2(){
            ckary2[0] = document.forms[0].gname.value;
            ckary2[1] = document.forms[0].gcomment.value;
            exp2=new Date();
            exp2.setTime(exp2.getTime()+365000*60*60*24*1);
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
            if (ckary2[0]) document.forms[0].gname.value = unescape(ckary2[0]);
            if (ckary2[1]) document.forms[0].gcomment.value = unescape(ckary2[1]);
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
 cdate = NowYear + "-" + NowMon + "-" + NowDay;

