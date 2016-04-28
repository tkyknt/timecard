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
    <h1>本日の出勤状況</h1><br />
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
    
    $today = date('Y-m-d');
    $sname[] = "宇野壮春";
    $sname[] = "関健太郎";
    $sname[] = "三木清雅";
    $sname[] = "鈴木淳";
    $sname[] = "瀬戸秀穂";
    $sname[] = "橋本光平";
    $sname[] = "伊左治美奈";
    $sname[] = "木野田拓也";

    print "今日の日付:".$today."<br />";
    print "<table border='1'>
    <tr>
    <th>打刻時刻</th><th>名前</th><th>日付</th><th>開始</th><th>出発</th><th>出勤</th>
    <th>遅刻</th><th>理由</th><th>業務名</th><th>業務内容</th></tr>";
    foreach ($sname as $stname) {
        $sql = $pdo->prepare("SELECT * FROM syukkin WHERE date = :today AND name = :stname");
        $sql ->bindValue(':today',$today);
        $sql ->bindValue(':stname',$stname);
        $sql->execute();
        $ct = 0;
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
            $ddate = $row['ddate'];
            $name = $row['name'];
            $date = $row['date'];
            $time = $row['time'];
            $time2 = $row['time2'];
            $syukkin = $row['syukkin'];
            $chikoku = $row['chikoku'];
            $comment = $row['comment'];
            $gname = $row['gname'];
            $gcomment = $row['gcomment'];
            echo "<td>"."$ddate"."</td>";
            echo "<td>"."$name"."</td>";
            echo "<td>"."$date"."</td>";
            echo "<td>"."$time"."</td>";
            echo "<td>"."$time2"."</td>";
            echo "<td>"."$syukkin"."</td>";
            echo "<td>"."$chikoku"."</td>";
            echo "<td>"."$comment"."</td>";
            echo "<td>"."$gname"."</td>";
            echo "<td>"."$gcomment"."</td></tr>";
            $ct++;
        }
        if ($ct == 0 ) {
            echo "<td>未入力</td><td>"."$stname"."</td><td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td><td></td></tr>";
        }
    }
    print "</table>";
    $pdo = null;
    ?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        