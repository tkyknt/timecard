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
    <br />
<?php
session_start();
echo "現在：",date('Y年m月d日 H:i'),"<br />";
echo "名前：",$_SESSION["name"],"<br />";
$name = $_SESSION["name"];
session_destroy()
?>
        <form action="insert_k.php" method="post">
            <input type ="hidden" name="name" value="<?= $name ?>">
            出勤休暇：
            <input type="radio" name="syukkin" onClick="naiset()" value="内勤" checked>内勤
            <input type="radio" name="syukkin" onClick="gaiset()" value="外勤" >外勤
            <input type="radio" name="syukkin" onClick="restset()" value="休暇" >休暇<br />
            遅刻：
            <input type="radio" name="chikoku" value="通常" checked>通常
            <input type="radio" name="chikoku" value="遅刻" >遅刻<br />
                         
            業務開始時刻：<input type="time" name="time"><br />
            出発時刻（外勤のみ）：<input type="time" name="time2" value= "" readonly><br />
            ※内勤の場合、打刻時刻と異なる場合は入力<br />
            　ただし、理由欄に異なる理由を記入すること<br />
            　外勤の場合、出発時刻は必須<br />

            理由欄（遅刻、休暇等）<br />
            <input type="text" name="comment" size="30" value="" /><br />
            <input type="button" value="名前保存" onClick="setck()"><br /><br />
            
            業務予定<br />
            主な業務名:<input type="text" name="gname" size="15" value="" /><br />
            目標・内容：<br /><input type="text" name="gcomment" size="30" value="" /><br />
           <br />
          <input type="button" value="業務予定保存" onClick="setck3()">
          <input type="button" value="読込" onClick="getck3()"><br /><br />
          <input type="submit" name="submit" value="登録する" /><br />
          </form>
    <A href="index.html">ホーム</A><br />
    </body>
</html>
