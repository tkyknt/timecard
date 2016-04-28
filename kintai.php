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
        <title>入力結果</title>
</head>
<body>

<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
  require_once 'DSN.php';
  $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
  $st = $pdo -> query("SET NAMES utf8;");
  $date = date('Y-m-d');
  $name = $_POST['name'];
  $sql = $pdo->prepare("SELECT * FROM kintai WHERE name LIKE ':name' AND date = ':date'");
  $sql -> bindValue(':name',$name);
  $sql -> bindValue(':date',$date);
  $sql -> execute();
$ct = 0;
while ($row = $st->fetch(PDO::FETCH_ASSOC)){
if ($ct == 0) {
    $id = $rows["id"];
    $ddate = $rows["ddate"];
    $date = $rows["date"];
    $time = $rows["time"];
    $syukkin = $rows["syukkin"];
    $chikoku = $rows["chikoku"];
    $comment = $rows["comment"];
    $time_t = $rows["time_t"];
    $ct++;
    }
}
if ($ct == 0 ) {
header("syukkin.html");
}

echo "現在：",date('Y年m月d日 H:i'),"<br />";
echo "名前：",$_POST['name'],"<br />";
$pdo = null;
?>

   <form action="update_t.php" method="post">
       <input type ="hidden" name="name" value="<?= $_POST['name'] ?>">
       <input type ="hidden" name="date" value="<?= $date ?>">
            時刻：<input type="time" name="time_t"><br />
            ※時刻は打刻時刻と異なる場合のみ入力<br />
            早退：
            <input type="radio" name="soutai" value="通常" checked>通常
            <input type="radio" name="soutai" value="早退" >早退<br />
            ※休暇、遅刻、早退場合は理由を記入<br />
            <input type="text" name="comment_t" size="30" value="" /><br />
           <input type="submit" name="submit" value="登録する" /> <br />
            </form>
        <br /><A href="syukkin.html">出勤入力</A><br />
        <A href="index.html">ホーム</A><br />
    </body>
</html>