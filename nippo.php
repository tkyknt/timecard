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
    <h1>入力完了</h1><br />
<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
  require_once 'DSN.php';
  $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
  $st = $pdo -> query("SET NAMES utf8;");
  if ( ! $_POST['date'] ){
      $date = date('Y-m-d');
      } else {
          $date = $_POST['date'];
      }
  $st = $pdo->prepare("INSERT INTO nippo VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $st->execute(array('',$_POST['name'], $date,
  $_POST['g1name'],$_POST['kinmu1'],$_POST['g1time'],$_POST['g1comment'],
  $_POST['g2name'],$_POST['kinmu2'],$_POST['g2time'],$_POST['g2comment'],
  $_POST['g3name'],$_POST['kinmu3'],$_POST['g3time'],$_POST['g3comment'],
  $_POST['g4name'],$_POST['kinmu4'],$_POST['g4time'],$_POST['g4comment']));
  
  print $_POST['name']."<br />";
  print $_POST['date']."<br />";
  
  print $_POST['g1name']."<br />"; 
  print $_POST['kinmu1']." 時間：";
  print $_POST['g1time']."<br />"; 
  print $_POST['g1comment']."<br />"; 
  
  print $_POST['g2name']."<br />"; 
  print $_POST['kinmu2']." 時間：";
  print $_POST['g2time']."<br />"; 
  print $_POST['g2comment']."<br />"; 
  
  print $_POST['g3name']."<br />"; 
  print $_POST['kinmu3']." 時間：";
  print $_POST['g3time']."<br />"; 
  print $_POST['g3comment']."<br />"; 

  print $_POST['g4name']."<br />"; 
  print $_POST['kinmu4']." 時間：";
  print $_POST['g4time']."<br />"; 
  print $_POST['g4comment']."<br />";   
  
$pdo = null;
?>
    <p><A href="check_f.php">入力チェック</A></p>
    <p><A href="index.html">ホーム</A></p>
</body>
</html>
        