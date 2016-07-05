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
        <title>発信器情報登録完了</title>
    </head>
    <body>
        <h1>発信器情報登録完了</h1>
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
        if(empty($_POST['ch'])){
            $freq = $_POST['freq'];
        }else{
            $freq = $_POST['ch'];
        }
        
        $st = $pdo->prepare("INSERT INTO teleme VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $st->execute(array('',$_POST['category'], $freq, $_POST['sn'],$_POST['digi_id'],
            $_POST['belt'],$_POST['battery'], $_POST['antenna'],$_POST['sig_freq'],
            $_POST['buy_date'], $_POST['store'], $_POST['pro_date'], '', '', '',
            $_POST['tele_com1'],$_POST['tele_com2'], 'TRUE', $_POST['duration'], date("Y-m-d")));
        
        echo $_POST['category'];
        echo $freq;
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
        echo $_POST['duration'];
        echo date("Y-m-d");
        
        $pdo = null;
        ?>
        <br /><A href="index.php">ホーム</A><br />
    </body>
</html>
