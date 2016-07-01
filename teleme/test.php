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
    
    $ct = 0;
    
    $group_name = "ノボル";
    
    $sql = $pdo->prepare("SELECT * FROM target WHERE target = :groupname");
        $sql ->bindValue(':groupname', $group_name);
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
            echo "<td>", $row['target_com'], "</td></tr><tr>";
            $ct ++;
        }
        
    echo $ct;
    $pdo = null;
?>
