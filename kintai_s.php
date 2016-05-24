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
        <title>出勤入力</title>
        <script type="text/javascript" src="cookie2.js"></script>
    </head>
    <body>
        <h1>出勤入力 </h1>
<?php
session_start();
echo "<div id='header'>",$_SESSION["name"],"<br />";
echo date('Y年m月d日 H:i'),"</div>";
session_destroy()
?>
        <form action="insert_k.php" method="post">
        <fieldset>
            <legend>勤怠</legend>
            <input type ="hidden" name="name" value="<?= $_SESSION["name"] ?>">
            <p>勤怠：
            <input type="radio" name="syukkin" onClick="naiset()" value="内勤" checked>内勤
            <input type="radio" name="syukkin" onClick="gaiset()" value="外勤" >外勤
            <input type="radio" name="syukkin" onClick="restset()" value="休暇" >休暇</p>
            <p>遅刻：　　　
            <input type="radio" name="chikoku" value="通常" checked>通常
            <input type="radio" name="chikoku" value="遅刻" >遅刻</p>
            <p>開始時刻：<input type="time" name="time">（打刻時刻と異なる場合は入力）</p>
            <p>出発時刻：<input type="time" name="time2" value= "" readonly>（外勤のみ入力）</p>
            <p>理由欄（遅刻、休暇等）<br />
            <input type="text" name="comment" size="30" value="" /></p>
        </fieldset>
        <fieldset>
            <legend>業務予定</legend>
            <p>主な業務　<select name="gname">
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
                </optgroup>
                
                <option value="その他">その他</option>
            </select></p>
            
            <p>備考<br /><textarea name="gcomment" cols="30" rows="2"></textarea></p>
        </fieldset>   
          <input type="button" value="業務予定保存" onClick="setck3()">
          <input type="button" value="読込" onClick="getck3()"><br />
          <input type="submit" name="submit" value="出勤" /><br />
          </form>
    <A href="index.html">ホーム</A><br />
    </body>
</html>
