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
    <div>入力内容抽出(退勤）</div><br />
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
    <th>打刻時刻</th><th>名前</th><th>日付</th><th>時刻</th><th>早退</th>
    <th>理由</th><th>業務名1</th><th>時間1</th><th>内容1</th>
    <th>業務名2</th><th>時間2</th><th>内容2</th>
    <th>業務名3</th><th>時間3</th><th>内容3</th>
    <th>業務名4</th><th>時間4</th><th>内容4</th></tr>";
    
    //テーブルからすべてのデータを取り出すSQL文を作る
        $pname ='%'.$_POST['name'].'%';
        $pdate1 =$_POST['date1'];
        $pdate2 =$_POST['date2'];
    if ($_POST['name'] == "全員"){
        $sql = $pdo->prepare("SELECT * FROM taikin WHERE date >= :pdate1 AND date <= :pdate2");
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
            }elseif ( ! $_POST['date1']) {
        $sql = $pdo->prepare("SELECT * FROM taikin WHERE name LIKE :pname");
        $sql ->bindValue(':pname',$pname);
            } else {
        $sql = $pdo->prepare("SELECT * FROM taikin WHERE name LIKE :pname
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
        $time = $row['time'];
        $soutai = $row['soutai'];
        $comment = $row['comment'];
        $g1name = $row['g1name'];
        $g1time = $row['g1time'];
        $g1comment = $row['g1comment'];
        $g2name = $row['g2name'];
        $g2time = $row['g2time'];
        $g2comment = $row['g2comment'];
        $g3name = $row['g3name'];
        $g3time = $row['g3time'];
        $g3comment = $row['g3comment'];
        $g4name = $row['g4name'];
        $g4time = $row['g4time'];
        $g4comment = $row['g4comment'];

        echo "<td>"."$ddate"."</td>";
        echo "<td>"."$name"."</td>";
        echo "<td>"."$date"."</td>";
        echo "<td>"."$time"."</td>";
        echo "<td>"."$soutai"."</td>";
        echo "<td>"."$comment"."</td>";
        echo "<td>"."$g1name"."</td>";
        echo "<td>"."$g1time"."</td>";
        echo "<td>"."$g1comment"."</td>";
        echo "<td>"."$g2name"."</td>";
        echo "<td>"."$g2time"."</td>";
        echo "<td>"."$g2comment"."</td>";
        echo "<td>"."$g3name"."</td>";
        echo "<td>"."$g3time"."</td>";
        echo "<td>"."$g3comment"."</td>";
        echo "<td>"."$g4name"."</td>";
        echo "<td>"."$g4time"."</td>";
        echo "<td>"."$g4comment"."</td></tr>";
        }
    
print "</table>";
$pdo = null;
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
