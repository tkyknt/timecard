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
  $sql = $pdo->prepare("SELECT * FROM kintai WHERE date = :date AND name = :name");
  $st -> bindValue(':date', $date, PDO::PARAM_INT);
  $sql->execute();
  
  if ($rows = $st -> fetch()) {
    $name = $rows["name"];
    $age = $rows["age"];
}

  
  $sql = "UPDATE kintai SET time2 = :time soutai = :soutai comment2 = :comment WHERE date = :date";
  $st = $pdo->prepare($sql);
  $params = array(':time' => $_POST['time'], ':soutai' => $_POST['soutai'], 
      ':comment' => $_POST['comment'], ':date' => $date);
  $st->execute($params);

  print date('Y-m-d H:i:s')."<br />"; 
  print $_POST['name']."<br />";
  print $_POST['date']."<br />";
  print $_POST['time']."<br />";
  print $_POST['soutai']."<br />";
  print $_POST['comment']."<br /><br />";
  
  $text = "戻る";
// リファラ値がなければ<a>タグを挿入しない
if (empty($_SERVER['HTTP_REFERER'])) {  
  echo $text;
}
// リファラ値があれば<a>タグ内へ
else {
  echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">' . $text . "</a>";
}
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        