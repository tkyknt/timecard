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
  if (array_key_exists('chikoku',$_POST)){
      $chikoku = $_POST['chikoku'];
      } else {
      $chikoku = "";
      }
      
  $st = $pdo->prepare("INSERT INTO kintai VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $st->execute(array('',date('Y-m-d H:i:s'),$_POST['name'], $date, $time,$_POST['time2'],
  $_POST['syukkin'],$chikoku,$_POST['comment'], $_POST['gname'], $_POST['gcomment'],'','','','','',''));

echo '打刻：',date('Y-m-d H:i:s')."<br />"; 
echo $_POST['name'],"<br />日付："; 
echo $date,"<br />出勤時刻：";
echo $time,"<br />出発時刻：";
echo $_POST['time2'],"<br />出勤：";
echo $_POST['syukkin'];
if(array_key_exists('chikoku',$_POST)){
    echo "<br />遅刻：", $_POST['chikoku'];
}
echo "<br />理由：", $_POST['comment'],"<br />業務名：";
echo $_POST['gname'],"<br />業務内容：";
echo $_POST['gcomment'];
$pdo = null;
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        