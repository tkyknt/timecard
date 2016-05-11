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
            
            
            ckary4 = new Array();
            function setck4(){
            ckary4[0] = document.forms[0].g1name.value;
            ckary4[1] = document.forms[0].g1time.value;
            ckary4[2] = document.forms[0].g1comment.value;
            ckary4[3] = document.forms[0].g2name.value;
            ckary4[4] = document.forms[0].g2time.value;
            ckary4[5] = document.forms[0].g2comment.value;
            ckary4[6] = document.forms[0].g3name.value;
            ckary4[7] = document.forms[0].g3time.value;
            ckary4[8] = document.forms[0].g3comment.value;
            ckary4[9] = document.forms[0].g4name.value;
            ckary4[10] = document.forms[0].g4time.value;
            ckary4[11] = document.forms[0].g4comment.value;
            
            exp4=new Date();
            exp4.setTime(exp4.getTime()+10000*60*60*24*1);
            ckstr4 = escape(ckary4[0]);
            i = 1;
            while (ckary4[i]){
		ckstr4 += "%00" + escape(ckary4[i]);
		i++;
                }
            document.cookie = "ASH4_jsc=" + ckstr4 + "; expires=" + exp4.toGMTString();
            }

            function getck4(){
            cklng4 = document.cookie.length;
            ckary4 = document.cookie.split("; ");
            ckstr4 = "";
            i = 0;
            while (ckary4[i]){
		if (ckary4[i].substr(0,9) == "ASH4_jsc="){
			ckstr4 = ckary4[i].substr(9,ckary4[i].length);
			break;
		}
		i++;
            }
            ckary4 = ckstr4.split("%00");
            if (ckary4[0]) document.forms[0].g1name.value = unescape(ckary4[0]);
            if (ckary4[1]) document.forms[0].g1time.value = unescape(ckary4[1]);
            if (ckary4[2]) document.forms[0].g1comment.value = unescape(ckary4[2]);
            if (ckary4[3]) document.forms[0].g2name.value = unescape(ckary4[3]);
            if (ckary4[4]) document.forms[0].g2time.value = unescape(ckary4[4]);
            if (ckary4[5]) document.forms[0].g2comment.value = unescape(ckary4[5]);
            if (ckary4[6]) document.forms[0].g3name.value = unescape(ckary4[6]);
            if (ckary4[7]) document.forms[0].g3time.value = unescape(ckary4[7]);
            if (ckary4[8]) document.forms[0].g3comment.value = unescape(ckary4[8]);
            if (ckary4[9]) document.forms[0].g4name.value = unescape(ckary4[9]);
            if (ckary4[10]) document.forms[0].g4time.value = unescape(ckary4[10]);
            if (ckary4[11]) document.forms[0].g4comment.value = unescape(ckary4[11]);
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
        
        function other1()
            {
            if(document.getElementById('changeSelect')){
            id = document.getElementById('changeSelect').value;
            if(id == 'その他'){
                document.forms[0].g1other.disabled = false;
            }else{
                document.forms[0].g1other.disabled = true;
            }
            }
        }
