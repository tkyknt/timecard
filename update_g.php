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
        <title>外出入力完了</title>
</head>
<body>
    <h1>外出入力完了</h1><br />
    
<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
  require_once 'DSN.php';
  $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
  $st = $pdo -> query("SET NAMES utf8;");

  $sql = 'UPDATE kintai SET time_go = :time_go, time_gi = :time_gi WHERE id = :id';
  $st = $pdo->prepare($sql);
  $params = array(':time_go' => $_POST['time_go'], ':time_gi' => $_POST['time_gi'], 
      ':id' => $_POST['id']);
  $st-> execute($params);
  print date('Y-m-d H:i:s')."<br />"; 
  print $_POST['name']."<br />";
  print $_POST['time_go']."～";
  print $_POST['time_gi']."<br />";
  
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        