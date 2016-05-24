            ckary = new Array();
            function setck(){
            ckary[0] = document.forms[0].name.value;
            exp=new Date();
            exp.setTime(exp.getTime()+365000*60*60*24*1);
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

