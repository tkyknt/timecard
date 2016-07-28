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
        <title>個体検索結果</title>
</head>
<body>
    <h1>個体検索結果</h1>
    
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
     echo '<table><tr><th width="12">id</th><th width="60">群れ</th><th width="60">個体名</th>
         <th>性別</th><th>周波数</th><th width="30">ID</th>
         <th width="30">受信感度</th><th width="48">ベルト</th>
         <th width="48">電池</th><th width="48">アン<br>テナ</th>
         <th width="84">装着<br>年月日</th><th width="30">装着<br>年齢</th>
         <th>備考</th><th>一覧<br>表示</th><th>選択</th></tr>';
     
    if($_POST['list_disp'] == "TRUE"){
    $select = 'SELECT * FROM target WHERE list_disp = "TRUE" AND ';
    }else{
    $select = "SELECT * FROM target WHERE ";
    }
     
    if(empty($_POST['groupname'])){
        $target = '%'. $_POST['target']. '%';
        $stmt = $select . "target LIKE :target";
        $sql = $pdo->prepare($stmt);
        $sql ->bindValue(':target', $target);
    }else{
        if(empty($_POST['target'])){
            $stmt = $select . "groups = :groupname";
            $sql = $pdo->prepare($stmt);
            $sql ->bindValue(':groupname', $_POST['groupname']);
        }else{
            $target = '%'. $_POST['target']. '%';
            $stmt = $select . "groups = :groupname AND target LIKE :target";
            $sql = $pdo->prepare($stmt);
            $sql ->bindValue(':groupname', $_POST['groupname']);
            $sql ->bindValue(':target', $target);
        }
    }
    $sql->execute();
    while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        echo "<tr><td>", $row['target_id'], "</td>";
        echo "<td>", $row['groups'], "</td>";
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
        echo "<td>", $row['list_disp'], "</td>";
        echo '<form action="upd_tar.php" method="post">';
        echo '<input type="hidden" name="target_id" value="', $row['target_id'], '">';
        echo '<td><input type="submit" value="編集">';
        echo '</form></td></tr>';
    }
    echo "</table>";
    $pdo = null;
?>
    
    <br /><A href="index.php">ホーム</A><br />
</body>
</html>
        