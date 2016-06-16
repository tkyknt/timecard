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
    <div>日報一覧(業務別）</div><br />
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
$list = array();

    //テーブルから条件に合っデータの取り出し
        $gname =$_POST['gname'];
        $pdate1 =$_POST['date1'];
        $pdate2 =$_POST['date2'];
    $ct = 0;
    //日付指定なしの場合
    if ( ! $_POST['date1']) {
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g1name = :gname");
        $sql ->bindValue(':gname',$gname);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu1'], 
            "gtime" => $row['g1time'], "gcomment" => $row['g1comment']);
        if($row['g1time'] == "午前" or $row['g1time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu1']] = $kinmu_c[$row['kinmu1']] + 0.5;
        }elseif($row['g1time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu1']] = $kinmu_c[$row['kinmu1']] + 1;
        }
        $gtime[] = $row['g1time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g2name = :gname");
        $sql ->bindValue(':gname',$gname);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu2'], 
            "gtime" => $row['g2time'], "gcomment" => $row['g2comment']);
        if($row['g2time'] == "午前" or $row['g2time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu2']] = $kinmu_c[$row['kinmu2']] + 0.5;
        }elseif($row['g2time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu2']] = $kinmu_c[$row['kinmu2']] + 1;
        }
        $gtime[] = $row['g2time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g3name = :gname");
        $sql ->bindValue(':gname',$gname);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu3'], 
            "gtime" => $row['g3time'], "gcomment" => $row['g3comment']);
        if($row['g3time'] == "午前" or $row['g3time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu3']] = $kinmu_c[$row['kinmu3']] + 0.5;
        }elseif($row['g3time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu3']] = $kinmu_c[$row['kinmu3']] + 1;
        }
        $gtime[] = $row['g3time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g4name = :gname");
        $sql ->bindValue(':gname',$gname);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu4'], 
            "gtime" => $row['g4time'], "gcomment" => $row['g4comment']);
        if($row['g4time'] == "午前" or $row['g4time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu4']] = $kinmu_c[$row['kinmu4']] + 0.5;
        }elseif($row['g4time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu4']] = $kinmu_c[$row['kinmu4']] + 1;
        }
        $gtime[] = $row['g4time'];
        }
    }
    //日付指定有りの場合
    elseif( ! $_POST['date2'])  {
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g1name = :gname
                AND date = :pdate1");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu1'], 
            "gtime" => $row['g1time'], "gcomment" => $row['g1comment']);
        if($row['g1time'] == "午前" or $row['g1time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu1']] = $kinmu_c[$row['kinmu1']] + 0.5;
        }elseif($row['g1time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu1']] = $kinmu_c[$row['kinmu1']] + 1;
        }
        $gtime[] = $row['g1time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g2name = :gname
                AND date = :pdate1");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu2'], 
            "gtime" => $row['g2time'], "gcomment" => $row['g2comment']);
        if($row['g2time'] == "午前" or $row['g2time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu2']] = $kinmu_c[$row['kinmu2']] + 0.5;
        }elseif($row['g2time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu2']] = $kinmu_c[$row['kinmu2']] + 1;
        }
        $gtime[] = $row['g2time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g3name = :gname
                AND date = :pdate1");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu3'], 
            "gtime" => $row['g3time'], "gcomment" => $row['g3comment']);
        if($row['g3time'] == "午前" or $row['g3time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu3']] = $kinmu_c[$row['kinmu3']] + 0.5;
        }elseif($row['g3time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu3']] = $kinmu_c[$row['kinmu3']] + 1;
        }
        $gtime[] = $row['g3time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g4name = :gname
                AND date = :pdate1");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu4'], 
            "gtime" => $row['g4time'], "gcomment" => $row['g4comment']);
        if($row['g4time'] == "午前" or $row['g4time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu4']] = $kinmu_c[$row['kinmu4']] + 0.5;
        }elseif($row['g4time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu4']] = $kinmu_c[$row['kinmu4']] + 1;
        }
        $gtime[] = $row['g4time'];
        }
        }else {
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g1name = :gname
                AND date >= :pdate1 AND date <= :pdate2");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu1'], 
            "gtime" => $row['g1time'], "gcomment" => $row['g1comment']);
        if($row['g1time'] == "午前" or $row['g1time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu1']] = $kinmu_c[$row['kinmu1']] + 0.5;
        }elseif($row['g1time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu1']] = $kinmu_c[$row['kinmu1']] + 1;
        }
        $gtime[] = $row['g1time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g2name = :gname
                AND date >= :pdate1 AND date <= :pdate2");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu2'], 
            "gtime" => $row['g2time'], "gcomment" => $row['g2comment']);
        if($row['g2time'] == "午前" or $row['g2time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu2']] = $kinmu_c[$row['kinmu2']] + 0.5;
        }elseif($row['g2time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu2']] = $kinmu_c[$row['kinmu2']] + 1;
        }
        $gtime[] = $row['g2time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g3name = :gname
                AND date >= :pdate1 AND date <= :pdate2");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu3'], 
            "gtime" => $row['g3time'], "gcomment" => $row['g3comment']);
        if($row['g3time'] == "午前" or $row['g3time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu3']] = $kinmu_c[$row['kinmu3']] + 0.5;
        }elseif($row['g3time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu3']] = $kinmu_c[$row['kinmu3']] + 1;
        }
        $gtime[] = $row['g3time'];
        }
        
        $sql = $pdo->prepare("SELECT * FROM nippo WHERE g4name = :gname
                AND date >= :pdate1 AND date <= :pdate2");
        $sql ->bindValue(':gname',$gname);
        $sql ->bindValue(':pdate1',$pdate1);
        $sql ->bindValue(':pdate2',$pdate2);
        $sql->execute();
           while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $list[] = array("id" => $row['id'], "date" => $row['date'], 
            "name" => $row['name'], "kinmu" => $row['kinmu4'], 
            "gtime" => $row['g4time'], "gcomment" => $row['g4comment']);
        if($row['g4time'] == "午前" or $row['g4time'] == "午後"){
            $name_c[$row['name']] = $name_c[$row['name']] + 0.5;
            $kinmu_c[$row['kinmu4']] = $kinmu_c[$row['kinmu4']] + 0.5;
        }elseif($row['g4time'] == "終日"){
            $name_c[$row['name']] = $name_c[$row['name']] + 1;
            $kinmu_c[$row['kinmu4']] = $kinmu_c[$row['kinmu4']] + 1;
        }
        $gtime[] = $row['g4time'];
        }
        }
        
    if ($list == NULL){
        die("データがありません<br /><A href='index.html'>ホーム</A>");
    }
    
    print "業務名：".$_POST['gname']."<br />";
    if($_POST['date1']){
        if($_POST['date2']){
            print $_POST['date1']."～".$_POST['date2']."<br />";
        }else{
             print $_POST['date1'];
        }
    }else{
        print "全期間";
    }
    print "<table border='1'>
    <tr>
    <th>id</th><th>日付</th><th>名前</th><th>勤務</th><th>時間1</th><th>内容1</th></tr>";
//並び替え
        foreach ($list as $key => $value){
        $key_id[$key] = $value[$_POST['sort']];
            }
        array_multisort ( $key_id , SORT_ASC , $list);
        
//データ表示
        foreach ($list as $data){
            echo "<td>".$data["id"]."</td>";
            echo "<td>".$data["date"]."</td>";
            echo "<td>".$data["name"]."</td>";
            echo "<td>".$data["kinmu"]."</td>";
            echo "<td>".$data["gtime"]."</td>";
            echo "<td>".$data["gcomment"]."</td></tr>";
        }

        print "</table><br />";
        
//集計
        $count_gtime = array_count_values($gtime);
        
        print "名前別集計<br />「午前、午後」は0.5、「終日」は1、「その他」はカウント無し<br />
            <table border='1'><tr><th>名前</th><th>回数</th></tr>";
        foreach ($name_c as $key => $value){
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td></tr>";
            }
        echo "</table>";
        
        print "勤務別集計　(集計方法は名前別と同様）<br /><table border='1'><tr><th>勤務</th><th>回数</th></tr>";
        foreach ($kinmu_c as $key => $value){
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td></tr>";
            }
        echo "</table>";
        
        print "時間別集計<br /><table border='1'><tr><th>時間</th><th>回数</th></tr>";
        foreach ($count_gtime as $key => $value){
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td></tr>";
            }
        echo "</table>";
            
        $pdo = null;
?>
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
