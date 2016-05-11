<!DOCTYPE html>
<html>
<head> 
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=4.0, user-scalable=yes">
        <link rel="stylesheet" media="all" type="text/css" href="css/pc.css" />
        <!-- ※デフォルトのスタイル（style.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
        <!-- ※タブレット用のスタイル（tablet.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
        <title>退勤入力</title>
</head>
<body>
<?php
session_start();
echo "<div id='header'>",$_SESSION["name"],"<br />";
echo "現在時刻：",date('Y年m月d日 H:i');
echo "<br />本日の出勤時刻：",date("H：i", strtotime($_SESSION["time"])),"</div>";
$name = $_SESSION["name"];
$date = $_SESSION["date"];
$id = $_SESSION["id"];
session_destroy();
?>
   <form action="update_k.php" method="post">
       <fieldset>
       <legend>退勤入力</legend>
       <input type ="hidden" name="name" value="<?= $name ?>">
       <input type ="hidden" name="date" value="<?=  $date ?>">
       <input type ="hidden" name="id" value="<?=  $id ?>">
            退勤時刻：<input type="time" name="time_t">打刻時刻と異なる場合入力<br />
            早退：
            <input type="radio" name="soutai" value="通常" checked>通常
            <input type="radio" name="soutai" value="早退" >早退<br />
            理由（休暇、遅刻、早退、外出等）<br />
            <input type="text" name="comment_t" size="30" value="" /><br />
           <input type="submit" name="submit" value="退勤" /> <br />
        </fieldset>  
   </form>

    <form action="update_g.php" method="post">
       <fieldset>
       <legend>外出入力</legend>
       <input type ="hidden" name="name" value="<?= $name ?>">
       <input type ="hidden" name="date" value="<?=  $date ?>">
       <input type ="hidden" name="id" value="<?=  $id ?>">
       時刻：<input type="time" name="time_go">～
       <input type="time" name="time_gi"><br />
       <input type="submit" name="submit" value="外出" /> <br />
       </fieldset>
       </form><br />
        <A href="index.html">ホーム</A><br />
    </body>
</html>