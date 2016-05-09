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
        <title>リスト</title>
</head>
<body>
    <div>入力内容抽出(勤怠）</div><br />
<?php
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    require_once 'DSN.php';
    try {
        $pdo = new PDO($dsn['host'],$dsn['user'],$dsn['pass'],
        array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`"));
	} catch (PDOException $e) {
        die($e->getMessage());
}
    print "名前：".$_POST['name']."<br />";
    print $_POST['date1']."～".$_POST['date2']."<br />";
    print "<table border='1'>
    <tr>
    <th>打刻時刻</th><th>名前</th><th>日付</th><th>開始</th><th>出発</th><th>勤務</th>
    <th>遅刻</th><th>理由</th><th>業務名</th><th>業務内容</th><th>退勤時刻</th>
    <th>早退</th><th>理由</th><th>外出出</th><th>外出戻</th></tr>";
    
    //テーブルからすべてのデータを取り出すSQL文を作る
        $pname =$_POST['name'];
        $pdate1 =$_POST['date1'];
        $pdate2 =$_POST['date2'];
    if ($_POST['name'] == "全員"){
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE date >= :pdate1 AND date <= :pdate2");
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
            }elseif ( ! $_POST['date1']) {
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE name LIKE :pname");
        $sql ->bindValue(':pname',$pname);
            } else {
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE name LIKE :pname
                AND date >= :pdate1 AND date < :pdate2");
        $sql ->bindValue(':pname',$pname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        }

        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $ddate = $row['ddate'];
        $name = $row['name'];
        $date = $row['date'];
        $datec[] = $row['date'];
        $time = $row['time'];
        $time2 = $row['time2'];
        $syukkin = $row['syukkin'];
        $syukkinc[] = $row['syukkin'];
        $chikoku = $row['chikoku'];
        $commnet = $row['comment'];
        $gname = $row['gname'];
        $gcomment = $row['gcomment'];
        $time_t = $row['time_t'];
        $soutai = $row['soutai'];
        $comment_t = $row['comment_t'];
        $time_go = $row['time_go'];
        $time_gi = $row['time_gi'];
        echo "<td>"."$ddate"."</td>";
        echo "<td>"."$name"."</td>";
        echo "<td>"."$date"."</td>";
        echo "<td>"."$time"."</td>";
        echo "<td>"."$time2"."</td>";
        echo "<td>"."$syukkin"."</td>";
        echo "<td>"."$chikoku"."</td>";
        echo "<td>"."$commnet"."</td>";
        echo "<td>"."$gname"."</td>";
        echo "<td>"."$gcomment"."</td>";
        echo "<td>"."$time_t"."</td>";
        echo "<td>"."$soutai"."</td>";
        echo "<td>"."$comment_t"."</td>";
        echo "<td>"."$time_go"."</td>";
        echo "<td>"."$time_gi"."</td></tr>";
        }
    
print "</table> <br />";

$count = array_count_values($syukkinc);
if( ! array_key_exists("出勤", $count)){
    $count_s = 0;
}else{
$count_s = $count["出勤"];
}
if( ! array_key_exists("内勤", $count)){
    $count_n = 0;
}else{
$count_n = $count["内勤"];
}
if( ! array_key_exists("外勤", $count)){
    $count_g = 0;
}else{
$count_g = $count["外勤"];
}
$count_sk = $count_s + $count_n + $count_g;
print "この期間の出勤日数は".$count_sk."日です。 <br />";
if( ! array_key_exists("休暇", $count)){
    print "この期間の休暇日数は0日です。 <br />";
}else{
print "この期間の休暇日数は".$count["休暇"]."日です。 <br />";
}

if ($datec != array_unique($datec)) {
print "重複している日付があります！";
}
$pdo = null;
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
