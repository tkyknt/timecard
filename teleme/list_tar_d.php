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
        <title>発信機装着個体一覧</title>
</head>
<body>
    <section class="sheet">
    <h1>発信器装着個体一覧</h1>
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
    
    $sql = $pdo->prepare("SELECT * FROM groups ORDER BY group_id");
    $sql->execute();
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $group_list[] = array($row['pref'], $row['area'], $row['group'], $row['page']);
    }
    
    $sql = $pdo->prepare("SELECT * FROM target WHERE list_disp = 'TRUE'");
    $sql->execute();
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $group_count[] = $row['groups'];
    }
    $group_num = array_count_values($group_count);
    
    $area = "東京";
    $pref = "東京";
    $pref_num  = array();
    $area_num  = array();
    
    foreach($group_list as &$value){
        if (key_exists($value[2], $group_num)){
            if($pref  == $value[0]){
                $pref_num[$value[0]] += $group_num[$value[2]];
            }else{
                $pref_num[$value[0]] = $group_num[$value[2]];
                $pref = $value[0];
            }
            if($area  == $value[1]){
                $area_num[$value[1]] += $group_num[$value[2]];
            }else{
                $area_num[$value[1]] = $group_num[$value[2]];
                $area = $value[1];
            }
        }
    }

    

    $group = "東京";
    $area = "東京";
    $pref = "東京";
    $page = 1;
    $ct = 0;
    
    foreach($group_list as $value){
        if (key_exists($value[2], $group_num)){
            if($pref != $value[0]){
                if($ct > 0){
                    echo "</table><br>";
                 }
                 if($page != $value[3]){
                     echo '</section><section class="sheet">';
                     $page = $value[3];
                 }
                echo '<table><tr><th colspan="14">',
                    $value[0], '</th></tr>';
                echo '<tr><th width="12"></th><th width="60">群れ</th><th width="60">個体名</th><th>性別</th><th>周波数</th>
                    <th width="30">ID</th><th width="30">受信感度</th><th width="48">ベルト</th><th width="48">電池</th>
                    <th width="48">アン<br>テナ</th><th width="60">装着<br>年月日</th><th width="30">装着<br>年齢</th>
                    <th>備考</th><th id="noprint"></th></tr>';
                $pref = $value[0];
            }else{
                echo '<tr>';
            }
        
        if($area != $value[1]){
            echo '<td rowspan="', $area_num[$value[1]], '">',
                    $value[1], "</td>";
            $area = $value[1];
        }
        
        echo '<td rowspan="', $group_num[$value[2]], '">',
                $value[2], "</td>";
        
        $group_name = $value[2];
        
        $sql = $pdo->prepare("SELECT * FROM target WHERE groups = :groupname AND list_disp = 'TRUE'");
        $sql ->bindValue(':groupname', $group_name);
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
            echo "<td>", $row['target'], "</td>";
            echo '<td align="center">', $row['sex'], "</td>";
            echo "<td>", $row['freq'], "</td>";
            echo '<td align="center">', $row['digi_id'], "</td>";
            echo '<td align="center">', $row['sens'], "</td>";
            echo '<td align="center">', $row['belt'], "</td>";
            echo '<td align="center">', $row['battery'], "</td>";
            echo '<td align="center">', $row['antenna'], "</td>";
            if($row['set_date'] == "0000-00-00"){
                echo '<td align="center">-</td>';
            }else{
                echo '<td align="center">', $row['set_date'], "</td>";
            }
            if($row['set_age'] == 0){
                echo '<td align="center">-</td>';
            }else{
                echo '<td align="center">', $row['set_age'], "</td>";
            }
            echo "<td>", $row['target_com'], "</td>";
            
            echo '<form action="list_del.php" method="post">';
            echo '<input type="hidden" name="target_id" value="', $row['target_id'], '">';
            echo '<td id="noprint"><input type="submit" value="除外">';
            echo '</form></td></tr>';
        }
        $ct ++;
    }
    }
    echo "</table>";
    $pdo = null;
?>
    
    <br /><A href="index.php">ホーム</A><br />
    </section>
</body>
</html>
        