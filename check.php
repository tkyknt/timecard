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
        <title>入力チェック</title>
</head>
<body>
    <div>入力チェック一覧</div><br />
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
    echo "名前：", $_POST['name'], "<br />";
    echo $_POST['month'], "<br />";
    echo "<table><tr align = 'center'><th>日付</th><th>曜日</th><th>出勤</th>
    <th>退勤</th><th>日報</th></tr>";
    
//入力条件に合わせてデータベースから抽出
        $pname =$_POST['name'];
        $pdate1 = date('Y-m-1', strtotime($_POST['month']));
        $pdate2 =date('Y-m-t', strtotime($_POST['month']));

//勤怠データベースから抽出
        $sql = $pdo->prepare("SELECT * FROM kintai WHERE name = :pname
                AND date >= :pdate1 AND date <= :pdate2 ORDER BY date");
        $sql ->bindValue(':pname',$pname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
       $sql->execute();
       $ct = 0;
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $kintai[] = $row['date'];
        $kinmu[$row['date']] = $row['syukkin'];
        $taikin[$row['date']] = $row['time_t'];
        $ct ++;
        }
        if ($ct == 0){
            $kintai_c = array();
        }else{
        $kintai_c = array_count_values($kintai);
        }

//日報データベースから抽出
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE name = :pname
                AND date >= :pdate1 AND date <= :pdate2 ORDER BY date");
        $sql ->bindValue(':pname',$pname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        $ct = 0;
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $nippo[] = $row['date'];
        $ct ++;
        }
        if ($ct == 0){
            $nippo_c = array();
        }else{
        $nippo_c = array_count_values($nippo);
        }

//カレンダーデータベースから抽出
        $sql = $pdo->prepare("SELECT * FROM workday WHERE date >= :pdate1
                AND date <= :pdate2 ORDER BY date");
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $workday[] = array($row['date'],$row['workday'],$row['wd']);
        }

//カレンダーと抽出データを比較し結果を表示
        foreach($workday as $key){
            if(array_key_exists($key[0] , $kintai_c)){
                if($kintai_c[$key[0]] >= 2){
                    $kintai_ck = "<strong>重複</strong>";
                    $taikin_ck = "-";
                }else{
                    $kintai_ck = $kinmu[$key[0]];
                    if($taikin[$key[0]] == "00:00:00"){
                        $taikin_ck = "<strong>未入力</strong>";
                    }else{
                        $taikin_ck = "○";
                    }
                }
            }else{
                if($key[1] == 1){
                    $kintai_ck = "<strong>未入力</strong>";
                    $taikin_ck = "<strong>未入力</strong>";
                }else{
                    $kintai_ck = "-";
                    $taikin_ck = "-";
                }
            }
            if($kintai_ck == "-" or $kintai_ck == "休暇"){
                $nippo_ck = "-";
                $taikin_ck = "-";
            }else{
                if(array_key_exists($key[0] , $nippo_c)){
                    if($nippo_c[$key[0]] >= 2){
                        $nippo_ck = "<strong>重複</strong>";
                    }else{
                        $nippo_ck = "○";
                    }
                }else{
                      $nippo_ck = "<strong>未入力</strong>";
                }
            }
        
        if($key[1] == 1){
            echo "<tr align = 'center'><td>";
        }else{
            echo "<tr align = 'center'><td bgcolor = '#fff0f5'>";
        }
        echo date('d', strtotime($key[0])), "</td><td>",  $key[2], "</td><td>",
                    $kintai_ck, "</td><td>", $taikin_ck, "</td><td>", $nippo_ck, "</td></tr>";
            }
    
echo "</table> <br>";

$pdo = null;
?>
    <p><A href="kintai_d.php">勤怠日付入力</A></p>
    <p><A href="nippo.html">日報入力</A></p>
    <p><A href="list.html">勤怠一覧</A></p>
    <p><A href="list_n.html">日報一覧（名前別）</A></p>
    <p><A href="index.html">ホーム</A></p>
</body>
</html>
