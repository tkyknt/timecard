<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, 
              minimum-scale=1.0, maximum-scale=4.0, user-scalable=yes">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" media="all" type="text/css" href="css/pc.css" />
        <!-- ※デフォルトのスタイル（style.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
        <!-- ※タブレット用のスタイル（tablet.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
        <!-- ※スマートフォン用のスタイル（smart.css） -->
        <meta charset="UTF-8">
        <title>装着個体情報登録完了</title>
    </head>
    <body>
        <h1>装着個体情報登録完了</h1>
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
        
        $st = $pdo->prepare("INSERT INTO target VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $st->execute(array('',$_POST['groupname'], $_POST['target'],$_POST['sex'],$_POST['set_date'],
            $_POST['set_age'],$_POST['target_com'], $_POST['sens'],$_POST['tel_id'],
            $_POST['category'], $_POST['freq'], $_POST['digi_id'], $_POST['belt'],
            $_POST['battery'],$_POST['antenna'], date("Y-m-d")));
        
        $sql = $pdo->prepare("SELECT * FROM target WHERE tel_id = :tel_id");
        $sql ->bindValue(':tel_id', $_POST['tel_id']);
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
            $target_id = $row['target_id'];
        }
        
         $sql = 'UPDATE teleme SET category = :category, freq = :freq, sn = :sn,
                digi_id = :digi_id, belt = :belt, battery = :battery,
                antenna = :antenna, sig_freq = :sig_freq, buy_date = :buy_date,
                store = :store, pro_date = :pro_date, set_date = :set_date, 
                tele_com1 = :tele_com1, tele_com2 = :tele_com2, stock = :stock, 
                duration = :duration, target_id = :target_id, target = :target, 
                update = :update WHERE tel_id = :tel_id;';
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
            ':set_date' => $_POST['set_date'],
            ':tele_com1' => $_POST['tele_com1'],
            ':tele_com2' => $_POST['tele_com2'],
            ':stock' => "FALSE",
            ':duration' => $_POST['duration'],
            ':target_id' => $target_id,
            ':target' => $_POST['target'],
            ':update' => date("Y-m-d"),
            ':tel_id' => $_POST['tel_id']);
        $st-> execute($params);
                
        echo $_POST['groupname'];
        echo $target_id;
        echo $_POST['target'];
        echo $_POST['sex'];
        echo $_POST['set_date'];
        echo $_POST['set_age'];
        echo $_POST['target_com'];
        echo $_POST['antenna'];
        echo $_POST['sig_freq'];
        echo $_POST['buy_date'];
        echo $_POST['store'];
        echo $_POST['pro_date'];
        echo $_POST['set_date'];
        echo $_POST['target'];
        echo $_POST['sens'];
        echo $_POST['tel_id'];
        echo $_POST['category'];
        echo $_POST['freq'];
        echo $_POST['digi_id'];
        echo $_POST['belt'];
        echo $_POST['battery'];
        echo $_POST['antenna'];
        echo date("Y-m-d");
        
        $pdo = null;
        ?>
        <br /><A href="index.php">ホーム</A><br />
    </body>
</html>
        
        
        
        