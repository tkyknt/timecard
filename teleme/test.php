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
    
    $sql = $pdo->prepare("SELECT * FROM groups");
    $sql->execute();
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $group_set = array($row['pref'], $row['area'], $row['group']);
        $group_list[] = $group_set;
        echo $group_set;
        $ct ++;
    }
    echo $ct;
    $pdo = null;
?>
