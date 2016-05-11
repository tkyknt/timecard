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
        <title>退勤入力完了</title>
</head>
<body>
    <h1>退勤入力完了</h1><br />
    
<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
  require_once 'DSN.php';
  $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
  $stmt = $pdo -> query("SET NAMES utf8;");
  
  if ( ! $_POST['time_t']){
    $time_t = date('H:i:s');
    } else {
    $time_t = $_POST['time_t'];
    }
    
  $sql = 'UPDATE kintai SET time_t = :time_t, soutai = :soutai, comment_t = :comment_t WHERE id = :id';
  $st = $pdo->prepare($sql);
  $params = array(':time_t' => $time_t, ':soutai' => $_POST['soutai'], ':comment_t' => $_POST['comment_t'], ':id' => $_POST['id']);
  $st-> execute($params);

  print date('Y-m-d')."<br />"; 
  print $_POST['name']."<br />退勤時刻：";
  print $_POST['time_t']."<br />早退：";
  print $_POST['soutai']."<br />理由：";
  print $_POST['comment_t']."<br /><br />";
  
  $sql = $pdo->prepare("SELECT * FROM nippo WHERE name = ? AND date = ?");
  $sql -> execute(array($_POST['name'], date('Y-m-d')));
  $ct = 0;
    while ($rows = $sql->fetch(PDO::FETCH_ASSOC)){
        $id = $rows["id"];
        $ct++;
        }
$pdo = null;
 if ($ct == 0 ) {
    echo "日報が未入力です！<br />><A href='nippo.html'>入力はこちらから</A>";
}else{
    echo "本日もお疲れ様でした";
}
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        