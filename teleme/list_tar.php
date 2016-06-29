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
        $group_set = array($row['pref'], $row['area'], $row['group']);
        $group_list[] = $group_set;
    }
    
    $sql = $pdo->prepare("SELECT * FROM target");
    $sql->execute();
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $group_count[] = $row['group'];
    }
    $group_num = array_count_values($group_count);
    
    $area = 0;
    $pref = 0;
    $pref_num  = array();
    $area_num  = array();
    
    foreach($group_list as $value){
        if (key_exists($value[2], $group_num)){
        if ( ! $value[0] == $pref){
            $pref_num["$value[0]"] = $group_num["$value[2]"];
            $pref = $value[0];            
        } else {
            $pref_num["$value[0]"] += $group_num["$value[2]"];
        }
        if( ! $value[1] == $area){
            $area_num["$value[1]"] = $group_num["$value[2]"];
            $area = $value[1];
        }else{
            $area_num["$value[1]"] += $group_num["$value[2]"];
        }
        }
    }
    
    print "<table>
    <tr>
    <th>県</th><th>地域</th><th>群れ</th><th>個体名</th>
    <th>性別</th><th>周波数</th><th>ID</th><th>受信感度</th><th>ベルト</th><th>電池</th>
    <th>アンテナ</th><th>装着年月日</th><th>装着時年齢</th><th備考</th></tr>";
    
    $group = 0;
    $area = 0;
    $pref = 0;
    
    foreach($group_list as $value){
        if( ! $value['pref'] == $pref){
            echo '<tr><td rowspan="', $pref_num[$value['pref']], '">',
                    $value['pref'], "</td>";
            $pref = $value['pref'];
        }else{
            echo '<tr>';
        }
        
        if( ! $value['area'] == $area){
            echo '<td rowspan="', $area_num[$value['area']], '">',
                    $value['area'], "</td>";
            $area = $value['area'];
        }
        
        echo '<td rowspan="', $group_num[$value['group']], '">',
                $value['group'], "</td>";
        
        $sql = $pdo->prepare("SELECT * FROM target WHERE group = :group ODER BY 
                set_date");
        $sql ->bindValue(':group', $value['group']);
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
            echo "<td>", $row['target'], "</td>";
            echo "<td>", $row['sex'], "</td>";
            echo "<td>", $row['freq'], "</td>";
            echo "<td>", $row['digi_id'], "</td>";
            echo "<td>", $row['sens'], "</td>";
            echo "<td>", $row['belt'], "</td>";
            echo "<td>", $row['battery'], "</td>";
            echo "<td>", $row['antenna'], "</td>";
            echo "<td>", $row['set_date'], "</td>";
            echo "<td>", $row['set_age'], "</td>";
            echo "<td>", $row['target_com'], "</td></tr>";
        }
    }
    echo "</table>";
            
        $pdo = null;
?>

    
    <br /><A href="index.html">ホーム</A><br />
</body>
</html>
        