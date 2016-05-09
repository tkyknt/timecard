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
        <title>出勤入力完了</title>
</head>
<body>
    <h1>出勤入力完了</h1><br />
    
<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
  require_once 'DSN.php';
  $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
  $st = $pdo -> query("SET NAMES utf8;");
  $date = date('Y-m-d');
  if ( ! $_POST['time']){
      $time = date('H:i:s');
      } else {
      $time = $_POST['time'];
      }
  $st = $pdo->prepare("INSERT INTO kintai VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $st->execute(array('',date('Y-m-d H:i:s'),$_POST['name'], $date, $time,$_POST['time2'],
  $_POST['syukkin'],$_POST['chikoku'],$_POST['comment'], $_POST['gname'], $_POST['gcomment'],'','',''));

print date('Y-m-d H:i:s')."<br />"; 
print $_POST['name']."<br />"; 
print $date."<br />";
print $_POST['time']."<br />";
print $_POST['time2']."<br />";
print $_POST['syukkin']."<br />";
print $_POST['chikoku']."<br />";
print $_POST['comment']."<br />";
print $_POST['gname']."<br />";
print $_POST['gcomment']."<br />";
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        