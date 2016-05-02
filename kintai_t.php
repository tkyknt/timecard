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
        <h1>退勤入力 </h1>
<?php
session_start();
echo "現在：",date('Y年m月d日 H:i'),"<br />";
echo "名前：",$_SESSION["name"],"<br />";
echo "本日の出勤時刻：",$_SESSION["time"],"<br />";
$name = $_SESSION["name"];
$date = $_SESSION["date"];
$id = $_SESSION["id"];
session_destroy();
?>

   <form action="update_k.php" method="post">
       <input type ="hidden" name="name" value="<?= $name ?>">
       <input type ="hidden" name="date" value="<?=  $date ?>">
       <input type ="hidden" name="id" value="<?=  $id ?>">
            時刻：<input type="time" name="time_t"><br />
            ※時刻は打刻時刻と異なる場合のみ入力<br />
            早退：
            <input type="radio" name="soutai" value="通常" checked>通常
            <input type="radio" name="soutai" value="早退" >早退<br />
            ※休暇、遅刻、早退場合は理由を記入<br />
            <input type="text" name="comment_t" size="30" value="" /><br />
           <input type="submit" name="submit" value="登録する" /> <br />
            </form>
        <A href="index.html">ホーム</A><br />
    </body>
</html>