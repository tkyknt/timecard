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
        <title>日報削除</title>
</head>
<body>
    <h1>日報削除完了</h1><br />
    
<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
  require_once 'DSN.php';
  $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
  $st = $pdo -> query("SET NAMES utf8;");

  $sql = 'delete from nippo WHERE id = ?';
  $st = $pdo->prepare($sql);
  $st->execute(array($_POST['id']));
  $pdo = null;
?>
    レコードを削除しました
    <br /><A href="list_n.html">日報抽出</A><br />
    <A href="nippo.html">日報入力</A><br />
    <A href="index.html">ホーム</A><br />
</body>
</html>
        