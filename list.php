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
//データベース接続
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

//表の出力
    print "名前：".$_POST['name']."<br />";
    print $_POST['date1']."～".$_POST['date2']."<br />";
    print "<table>
    <tr>
    <th>名前</th><th>日付</th><th>開始</th><th>出発</th><th>勤務</th>
    <th>遅刻</th><th>理由</th><th>業務名</th><th>備考</th><th>退勤時刻</th>
    <th>早退</th><th>理由</th><th>外出出</th><th>外出戻</th><th>打刻</th><th>削除</th></tr>";
    
    //入力条件に合わせてデータベースから抽出
        $pname =$_POST['name'];
        $pdate1 =$_POST['date1'];
        $pdate2 =$_POST['date2'];
    if ($_POST['name'] == "全員"){
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE date >= :pdate1 AND date <= :pdate2 ORDER BY date");
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
            }elseif ( ! $_POST['date1']) {
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE name LIKE :pname ORDER BY date");
        $sql ->bindValue(':pname',$pname);
            } else {
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE name LIKE :pname
                AND date >= :pdate1 AND date < :pdate2 ORDER BY date");
        $sql ->bindValue(':pname',$pname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        }
        //結果を出力
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $ddate = $row['ddate'];
        $name = $row['name'];
        $date = $row['date'];
        $datec[] = $row['date'];
        $syukkin = $row['syukkin'];
        $syukkinc[] = $row['syukkin'];
        $chikoku = $row['chikoku'];
        $commnet = $row['comment'];
        $gname = $row['gname'];
        $gcomment = $row['gcomment'];
        $soutai = $row['soutai'];
        $comment_t = $row['comment_t'];

        //時刻入力無しはブランク
        if ($row['time'] == "00:00:00"){$time = "";}
        else {$time = date("H：i", strtotime($row['time']));}
        if ($row['time2'] == "00:00:00"){$time2 = "";}
         else {$time2 = date("H：i", strtotime($row['time2']));}
        if ($row['time_t'] == "00:00:00"){$time_t = "";}
         else {$time_t = date("H：i", strtotime($row['time_t']));}
        if ($row['time_go'] == "00:00:00"){$time_go = "";}
         else {$time_go = date("H：i", strtotime($row['time_go']));}
        if ($row['time_gi'] == "00:00:00"){$time_gi = "";}
         else {$time_gi = date("H：i", strtotime($row['time_gi']));}
        
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
        echo "<td>"."$time_gi"."</td>";
        echo "<td>"."$ddate"."</td>";
        echo '<form action="delete_k.php" method="post">';
        echo '<input type="hidden" name="id" value="'. $row["id"]. '">';
        echo '<td><input type="submit" value="削除">';
        echo '</form></td></tr>';
        
        }
    
print "</table> <br />";

//出勤日カウント
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

//出勤日出力
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
