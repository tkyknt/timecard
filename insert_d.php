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
        <title>勤怠入力完了</title>
</head>
<body>
    <h1>勤怠入力完了</h1>
    
<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
  require_once 'DSN.php';
  $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
  $st = $pdo -> query("SET NAMES utf8;");
  
  if (array_key_exists('chikoku',$_POST)){
      $chikoku = $_POST['chikoku'];
      } else {
      $chikoku = "";
      }
  if (array_key_exists('soutai',$_POST)){
      $soutai = $_POST['soutai'];
      } else {
      $soutai = "";
      }
  
  $st = $pdo->prepare("INSERT INTO kintai VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $st->execute(array('',date('Y-m-d H:i:s'),$_POST['name'], $_POST['date'],
      $_POST['time'],$_POST['time2'], $_POST['syukkin'],$chikoku,
      $_POST['comment'], $_POST['gname'], $_POST['gcomment'], $_POST['time_t'], $_POST['time_c'],
      $soutai,$_POST['comment_t'],$_POST['time_go'], $_POST['time_gi']));

echo '打刻：',date('Y-m-d H:i:s')."<br />"; 
echo $_POST['name'],"<br />日付："; 
echo $_POST['date'],"<br />出勤時刻：";
echo $_POST['time'],"<br />出発時刻：";
echo $_POST['time2'],"<br />退勤時刻：";
echo $_POST['time_t'];
if ( !($_POST['time_c'] == "")){
      echo "<br />到着時刻：", $_POST['time_c'];
  }
echo "<br />出勤", $_POST['syukkin'];
if(array_key_exists('chikoku',$_POST)){
    echo "<br />遅刻：", $_POST['chikoku'];
}
if(array_key_exists('soutai',$_POST)){
    echo "<br />早退：", $_POST['soutai'];
}
echo "理由１：", $_POST['comment'],"<br />理由２：";
echo $_POST['comment_t'],"<br />業務名：";
echo $_POST['gname'],"<br />業務内容：";
echo $_POST['gcomment'],"<br />外出：";
echo $_POST['time_go'],"～",$_POST['time_gi'],"<br />";
$pdo = null;
?>
    <p><A href="check_f.php">入力チェック</A></p>
    <p><A href="index.html">ホーム</A></p>
</body>
</html>
        