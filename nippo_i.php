<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=4.0, user-scalable=yes">
        <link rel="stylesheet" media="all" type="text/css" href="css/pc.css" />
        <!-- ※デフォルトのスタイル（style.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
        <!-- ※タブレット用のスタイル（tablet.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
        <!-- ※スマートフォン用のスタイル（smart.css） -->
        <title>日報入力</title>
        <script type="text/javascript" src="cookie3.js"></script>
<body onLoad = "getck()" onLoad = "gettoday()">
    <h1>日報入力</h1>
        <form action="nippo.php" method="post">
            名前：
            <select name="name">
                <option value="宇野壮春" selected>宇野壮春</option>
                <option value="関健太郎">関健太郎</option>
                <option value="三木清雅" >三木清雅</option>
                <option value="鈴木淳">鈴木淳</option>
                <option value="瀬戸秀穂">瀬戸秀穂</option>
                <option value="橋本光平">橋本光平</option>
                <option value="伊左治美奈">伊左治美奈</option>
                <option value="木野田拓也">木野田拓也</option>
            </select><br />
            日付：<input type="date" value= "<?php echo date("Y-m-d");?>" name="date"><br />

            <fieldset>
            <legend>業務内容</legend>
            <p>業務名<select name="g1name">
                <option value="" selected></option>
                <option value="会社業務">会社業務</option>
                
                <optgroup label="サル">
                <option value="仙台市サル調査">仙台市サル調査</option>
                <option value="七ヶ宿町サル調査">七ヶ宿町サル調査</option>
                <option value="白石市サル調査">白石市サル調査</option>
                <option value="釜石市サル調査">釜石市サル調査</option>
                <option value="宮城県サル調査">宮城県サル調査</option>
                <option value="福島県サル調査">福島県サル調査</option>
                <option value="南奥羽サル調査">南奥羽サル調査</option>
                </optgroup>
                
                <optgroup label="クマ">
                <option value="仙台市クマ調査">仙台市クマ調査</option>
                <option value="宮城県クマ調査">宮城県クマ調査</option>
                <option value="宮城県クマ錯誤捕獲対応">宮城県クマ錯誤捕獲対応</option>
                </optgroup>
                
                <optgroup label="イノシシ">
                <option value="宮城県イノシシ集落ぐるみ">宮城県イノシシ集落ぐるみ</option>
                <option value="福島県イノシシ調査">福島県イノシシ調査</option>
                <option value="JAXAイノシシ調査">JAXAイノシシ調査</option>
                <option value="角田市イノシシ講習会">角田市イノシシ講習会</option>
                </optgroup>
                
                <optgroup label="シカ">
                <option value="早池峰シカ調査">早池峰シカ調査</option>
                <option value="白神シカ調査">白神シカ調査</option>
                <option value="環境省シカ調査">環境省シカ調査</option>
                <option value="ＷＭＯ研修会事業">ＷＭＯ研修会事業</option>
                <option value="環境省白神科学委員運営">環境省白神科学委員運営</option>
                </optgroup>
                
                <option value="その他">その他</option>
            </select><br />
            
            <input type="radio" name="kinmu1" value="内勤">内勤
            <input type="radio" name="kinmu1" value="外勤" >外勤　
            <input type="radio" name="kinmu1" value="" 
                 checked="checked" style="display:none;" />
            
            時間<select name="g1time">
                <option value=""></option>
                <option value="午前">午前</option>
                <option value="午後">午後</option>
                <option value="終日" >終日</option>
                <option value="その他">その他</option>
            </select><br />
            
            内容・成果：<input type="text" name="g1comment" size="30" value="" /></p>
           
           
            <p>業務名<select name="g2name">
                <option value="" selected></option>
                <option value="会社業務">会社業務</option>
                
                <optgroup label="サル">
                <option value="仙台市サル調査">仙台市サル調査</option>
                <option value="七ヶ宿町サル調査">七ヶ宿町サル調査</option>
                <option value="白石市サル調査">白石市サル調査</option>
                <option value="釜石市サル調査">釜石市サル調査</option>
                <option value="宮城県サル調査">宮城県サル調査</option>
                <option value="福島県サル調査">福島県サル調査</option>
                <option value="南奥羽サル調査">南奥羽サル調査</option>
                </optgroup>
                
                <optgroup label="クマ">
                <option value="仙台市クマ調査">仙台市クマ調査</option>
                <option value="宮城県クマ調査">宮城県クマ調査</option>
                <option value="宮城県クマ錯誤捕獲対応">宮城県クマ錯誤捕獲対応</option>
                </optgroup>
                
                <optgroup label="イノシシ">
                <option value="宮城県イノシシ集落ぐるみ">宮城県イノシシ集落ぐるみ</option>
                <option value="福島県イノシシ調査">福島県イノシシ調査</option>
                <option value="JAXAイノシシ調査">JAXAイノシシ調査</option>
                <option value="角田市イノシシ講習会">角田市イノシシ講習会</option>
                </optgroup>
                
                <optgroup label="シカ">
                <option value="早池峰シカ調査">早池峰シカ調査</option>
                <option value="白神シカ調査">白神シカ調査</option>
                <option value="環境省シカ調査">環境省シカ調査</option>
                <option value="ＷＭＯ研修会事業">ＷＭＯ研修会事業</option>
                <option value="環境省白神科学委員運営">環境省白神科学委員運営</option>
                </optgroup>
                
                <option value="その他">その他</option>
            </select><br />
            
            <input type="radio" name="kinmu2" value="内勤">内勤
            <input type="radio" name="kinmu2" value="外勤" >外勤　
            <input type="radio" name="kinmu2" value="" 
                 checked="checked" style="display:none;" />
            
            時間<select name="g2time">
                <option value=""></option>
                <option value="午前">午前</option>
                <option value="午後">午後</option>
                <option value="終日" >終日</option>
                <option value="その他">その他</option>
            </select><br />
            内容・成果：<input type="text" name="g2comment" size="30" value="" /></p>
           
            <p>業務名<select name="g3name">
                <option value="" selected></option>
                <option value="会社業務">会社業務</option>
                
                <optgroup label="サル">
                <option value="仙台市サル調査">仙台市サル調査</option>
                <option value="七ヶ宿町サル調査">七ヶ宿町サル調査</option>
                <option value="白石市サル調査">白石市サル調査</option>
                <option value="釜石市サル調査">釜石市サル調査</option>
                <option value="宮城県サル調査">宮城県サル調査</option>
                <option value="福島県サル調査">福島県サル調査</option>
                <option value="南奥羽サル調査">南奥羽サル調査</option>
                </optgroup>
                
                <optgroup label="クマ">
                <option value="仙台市クマ調査">仙台市クマ調査</option>
                <option value="宮城県クマ調査">宮城県クマ調査</option>
                <option value="宮城県クマ錯誤捕獲対応">宮城県クマ錯誤捕獲対応</option>
                </optgroup>
                
                <optgroup label="イノシシ">
                <option value="宮城県イノシシ集落ぐるみ">宮城県イノシシ集落ぐるみ</option>
                <option value="福島県イノシシ調査">福島県イノシシ調査</option>
                <option value="JAXAイノシシ調査">JAXAイノシシ調査</option>
                <option value="角田市イノシシ講習会">角田市イノシシ講習会</option>
                </optgroup>
                
                <optgroup label="シカ">
                <option value="早池峰シカ調査">早池峰シカ調査</option>
                <option value="白神シカ調査">白神シカ調査</option>
                <option value="環境省シカ調査">環境省シカ調査</option>
                <option value="ＷＭＯ研修会事業">ＷＭＯ研修会事業</option>
                <option value="環境省白神科学委員運営">環境省白神科学委員運営</option>
                </optgroup>
                
                <option value="その他">その他</option>
            </select><br />
            
            <input type="radio" name="kinmu3" value="内勤">内勤
            <input type="radio" name="kinmu3" value="外勤" >外勤　
            <input type="radio" name="kinmu3" value="" 
                 checked="checked" style="display:none;" />
            
            時間<select name="g3time">
                <option value=""></option>
                <option value="午前">午前</option>
                <option value="午後">午後</option>
                <option value="終日" >終日</option>
                <option value="その他">その他</option>
            </select><br />
            内容・成果：<input type="text" name="g3comment" size="30" value="" /></p>
           
            <p>業務名<select name="g4name">
                <option value="" selected></option>
                <option value="会社業務">会社業務</option>
                
                <optgroup label="サル">
                <option value="仙台市サル調査">仙台市サル調査</option>
                <option value="七ヶ宿町サル調査">七ヶ宿町サル調査</option>
                <option value="白石市サル調査">白石市サル調査</option>
                <option value="釜石市サル調査">釜石市サル調査</option>
                <option value="宮城県サル調査">宮城県サル調査</option>
                <option value="福島県サル調査">福島県サル調査</option>
                <option value="南奥羽サル調査">南奥羽サル調査</option>
                </optgroup>
                
                <optgroup label="クマ">
                <option value="仙台市クマ調査">仙台市クマ調査</option>
                <option value="宮城県クマ調査">宮城県クマ調査</option>
                <option value="宮城県クマ錯誤捕獲対応">宮城県クマ錯誤捕獲対応</option>
                </optgroup>
                
                <optgroup label="イノシシ">
                <option value="宮城県イノシシ集落ぐるみ">宮城県イノシシ集落ぐるみ</option>
                <option value="福島県イノシシ調査">福島県イノシシ調査</option>
                <option value="JAXAイノシシ調査">JAXAイノシシ調査</option>
                <option value="角田市イノシシ講習会">角田市イノシシ講習会</option>
                </optgroup>
                
                <optgroup label="シカ">
                <option value="早池峰シカ調査">早池峰シカ調査</option>
                <option value="白神シカ調査">白神シカ調査</option>
                <option value="環境省シカ調査">環境省シカ調査</option>
                <option value="ＷＭＯ研修会事業">ＷＭＯ研修会事業</option>
                <option value="環境省白神科学委員運営">環境省白神科学委員運営</option>
                </optgroup>
                
                <option value="その他">その他</option>
            </select><br />
            
            <input type="radio" name="kinmu4" value="内勤">内勤
            <input type="radio" name="kinmu4" value="外勤" >外勤　
            <input type="radio" name="kinmu4" value="" 
                 checked="checked" style="display:none;" />
            
            時間<select name="g4time">
                <option value=""></option>
                <option value="午前">午前</option>
                <option value="午後">午後</option>
                <option value="終日" >終日</option>
                <option value="その他">その他</option>
            </select><br />
            内容・成果：<input type="text" name="g4comment" size="30" value="" /></p>

          <input type="button" value="業務内容保存" onClick="setck4()">
          <input type="button" value="読込" onClick="getck4()"><br />
           <input type="submit" name="submit" onClick="setck()" value="登録する" /> <br />
</fieldset> 
            </form>

        <A href="index.html">ホーム</A><br />
    </body>
