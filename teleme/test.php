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
        
        
        $sql = 'UPDATE teleme SET category = :category, freq = :freq, sn = :sn, '
                . 'digi_id = :digi_id, belt = :belt, battery = :battery, '
                . 'antenna = :antenna, sig_freq = :sig_freq, buy_date = :buy_date, ' 
                . 'store = :store, pro_date = :pro_date, tele_com1 = :tele_com1, '
                . 'tele_com2 = :tele_com2, duration = :duration, stock = :stock, '
                . 'update = :update WHERE tel_id = :tel_id';
        $st = $pdo->prepare($sql);
        $params = array(
            ':category' => $_POST['category'],
            ':freq' => $_POST['freq'],
            ':sn' => $_POST['sn'],
            ':digi_id' => $_POST['digi_id'],
            ':belt' => $_POST['belt'],
            ':battery' => $_POST['battery'],
            ':antenna' => $_POST['antenna'],
            ':sig_freq' => $_POST['sig_freq'],
            ':buy_date' => $_POST['buy_date'],
            ':store' => $_POST['store'],
            ':pro_date' => $_POST['pro_date'],
            ':tele_com1' => $_POST['tele_com1'],
            ':tele_com2' => $_POST['tele_com2'],
            ':duration' => $_POST['duration'],
            ':stock' => $_POST['stock'],
            ':update' => date("Y-m-d"),
            ':tel_id' => $_POST['tel_id']);
        $st-> execute($params);
        
        $sql = 'UPDATE target SET category = :category, freq = :freq, digi_id = :digi_id, '
            . 'belt = :belt, battery = :battery, antenna = :antenna, update = :update '
            . 'WHERE target_id = :target_id;';
        $st = $pdo->prepare($sql);
        $params = array(
            ':category' => $_POST['category'],
            ':freq' => $_POST['freq'],
            ':digi_id' => $_POST['digi_id'],
            ':belt' => $_POST['belt'],
            ':battery' => $_POST['battery'],
            ':antenna' => $_POST['antenna'],
            ':update' => date("Y-m-d"),
            ':target_id' => $_POST['target_id']);
        $st-> execute($params);
        
    echo $ct;
    $pdo = null;
?>
