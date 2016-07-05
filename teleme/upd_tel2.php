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
        <title>発信器情報編集完了</title>
    </head>
    <body>
        <h1>発信器情報編集完了</h1>
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
        
         $sql = 'UPDATE teleme SET category = :category, freq = :freq, sn = :sn,
                digi_id = :digi_id, belt = :belt, battery = :battery,
                antenna = :antenna, sig_freq = :sig_freq, buy_date = :buy_date,
                store = :store, pro_date = :pro_date, tele_com1 = :tele_com1, 
                tele_com2 = :tele_com2, stock = :stock, duration = :duration, 
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
            ':tele_com1' => $_POST['tele_com1'],
            ':tele_com2' => $_POST['tele_com2'],
            ':stock' => $_POST['stock'],
            ':duration' => $_POST['duration'],
            ':update' => date("Y-m-d"),
            ':tel_id' => $_POST['tel_id']);
        $st-> execute($params);
        
        echo $_POST['tel_id'];
        echo $_POST['category'];
        echo $_POST['freq'];
        echo $_POST['sn'];
        echo $_POST['digi_id'];
        echo $_POST['belt'];
        echo $_POST['battery'];
        echo $_POST['antenna'];
        echo $_POST['sig_freq'];
        echo $_POST['buy_date'];
        echo $_POST['store'];
        echo $_POST['pro_date'];
        echo $_POST['tele_com1'];
        echo $_POST['tele_com2'];
        echo $_POST['stock'];
        echo $_POST['duration'];
        echo date("Y-m-d");
        
        $pdo = null;
        ?>
        <br /><A href="index.php">ホーム</A><br />
    </body>
</html>
        
        
        
        