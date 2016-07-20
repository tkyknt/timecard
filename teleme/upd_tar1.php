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
        
        $up_date = date("Y-m-d");
        
         $sql = 'UPDATE teleme SET category = :category, freq = :freq, '
               . 'digi_id = :digi_id, belt = :belt, battery = :battery, '
               . 'antenna = :antenna, up_date = :up_date WHERE tel_id = :tel_id';
        $st = $pdo->prepare($sql);
        $params = array(
            ':category' => $_POST['category'],
            ':freq' => $_POST['freq'],
            ':digi_id' => $_POST['digi_id'],
            ':belt' => $_POST['belt'],
            ':battery' => $_POST['battery'],
            ':antenna' => $_POST['antenna'],
            ':up_date' => $up_date,
            ':tel_id' => $_POST['tel_id']);
        $st-> execute($params);
        
        $sql = 'UPDATE target SET groups = :groups, target = :target, sex = :sex, '
            . 'set_date = :set_date, set_age = :set_age, target_com = :target_com, '
            . 'sens = :sens, category = :category, freq = :freq, digi_id = :digi_id, '
            . 'belt = :belt, battery = :battery, antenna = :antenna, list_disp = :list_disp, '
            . 'up_date = :up_date '
            . 'WHERE target_id = :target_id';
        $st = $pdo->prepare($sql);
        $params = array(
            ':groups' => $_POST['groups'],
            ':target' => $_POST['target'],
            ':sex' => $_POST['sex'],
            ':set_date' => $_POST['set_date'],
            ':set_age' => $_POST['set_age'],
            ':target_com' => $_POST['target_com'],
            ':sens' => $_POST['sens'],
            ':category' => $_POST['category'],
            ':freq' => $_POST['freq'],
            ':digi_id' => $_POST['digi_id'],
            ':belt' => $_POST['belt'],
            ':battery' => $_POST['battery'],
            ':antenna' => $_POST['antenna'],
            ':list_disp' => $_POST['list_disp'],
            ':up_date' => $up_date,
            ':target_id' => $_POST['target_id']);
        $st-> execute($params);
        
        echo '<p>', $_POST['target_id'], '</p>';
        echo '<p>', $_POST['groups'], '</p>';
        echo '<p>', $_POST['sex'], '</p>';
        echo '<p>', $_POST['set_date'], '</p>';
        echo '<p>', $_POST['set_age'], '</p>';
        echo '<p>', $_POST['target_com'], '</p>';
        echo '<p>', $_POST['sens'], '</p>';
        echo '<p>', $_POST['tel_id'], '</p>';
        echo '<p>', $_POST['category'], '</p>';
        echo '<p>', $_POST['freq'], '</p>';
        echo '<p>', $_POST['digi_id'], '</p>';
        echo '<p>', $_POST['belt'], '</p>';
        echo '<p>', $_POST['battery'], '</p>';
        echo '<p>', $_POST['antenna'], '</p>';
        echo '<p>', $_POST['list_disp'], '</p>';
        echo '<p>', $up_date, '</p>';
        $pdo = null;
        ?>
        <br /><A href="index.php">ホーム</A><br />
    </body>
</html>
        
        
        
        