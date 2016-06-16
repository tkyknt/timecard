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
        <title>本日の出勤状況</title>
</head>
<body>
    <h1>本日の出勤状況</h1>
<?php
//データベースに接続
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
    
//日付、社員名準備
    $today = date('Y-m-d');
    $sname[] = "宇野壮春";
    $sname[] = "関健太郎";
    $sname[] = "三木清雅";
    $sname[] = "鈴木淳";
    $sname[] = "瀬戸秀穂";
    $sname[] = "橋本光平";
    $sname[] = "伊左治美奈";
    $sname[] = "木野田拓也";

//表の準備
    print "今日の日付:".$today."<br />";
    print "<table>
    <tr>
    <th>名前</th><th>開始</th><th>出発</th><th>勤務</th>
    <th>遅刻</th><th>理由</th><th>業務名</th><th>備考</th><th>退勤</th><th>到着</th>
    <th>早退</th><th>理由</th><th>外出出</th><th>外出戻</th></tr>";
    
//社員名の数だけ1行ずつデータ取り出し表示
    foreach ($sname as $stname) {
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE date = :today AND name = :stname");
        $sql ->bindValue(':today',$today);
        $sql ->bindValue(':stname',$stname);
        $sql->execute();
        $ct = 0;
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
            
        //時刻入力無しはブランク
        if ($row['time'] == "00:00:00"){$time = "";}
        else {$time = date("H：i", strtotime($row['time']));}
        if ($row['time2'] == "00:00:00"){$time2 = "";}
         else {$time2 = date("H：i", strtotime($row['time2']));}
        if ($row['time_t'] == "00:00:00"){$time_t = "";}
         else {$time_t = date("H：i", strtotime($row['time_t']));}
         if ($row['time_c'] == "00:00:00"){$time_c = "";}
         else {$time_c = date("H：i", strtotime($row['time_c']));}
        if ($row['time_go'] == "00:00:00"){$time_go = "";}
         else {$time_go = date("H：i", strtotime($row['time_go']));}
        if ($row['time_gi'] == "00:00:00"){$time_gi = "";}
         else {$time_gi = date("H：i", strtotime($row['time_gi']));}

        //データの表示
        echo "<td>",$row['name'];
        echo "</td><td>",$time;
        echo "</td><td>",$time2;
        echo "</td><td>",$row['syukkin'];
        echo "</td><td>",$row['chikoku'];
        echo "</td><td>",$row['comment'];
        echo "</td><td>",$row['gname'];
        echo "</td><td>",$row['gcomment'];
        echo "</td><td>",$time_t;
        echo "</td><td>",$time_c;
        echo "</td><td>",$row['soutai'];
        echo "</td><td>",$row['comment_t'];
        echo "</td><td>",$time_go;
        echo "</td><td>",$time_gi,"</td></tr>";
            $ct++;
        }
        
        //データ無しの場合未入力表示
        if ($ct == 0 ) {
            echo '<td>',$stname,'</td><td style="background:#ffcccc">未入力</td>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                <td></td><td></td><td></td><td></td><td></td></tr>';
        }
    }
    print "</table>";
    $pdo = null;
    ?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        