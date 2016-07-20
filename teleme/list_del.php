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
        <title>一覧から除外</title>
    </head>
    <body>
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
        
        $list_disp = "FALSE";
        $up_date = date("Y-m-d");
        
        $sql = 'UPDATE target SET list_disp = :list_disp, up_date = :up_date '
            . 'WHERE target_id = :target_id';
        $st = $pdo->prepare($sql);
        $params = array(
            ':list_disp' => $list_disp, 
            ':up_date' => $up_date, 
            ':target_id' => $_POST['target_id']);
        $st-> execute($params);
        
        $sql = $pdo->prepare("SELECT * FROM target WHERE target_id = :target_id");
        $sql ->bindValue(':target_id', $_POST['target_id']);
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
            echo $row['target'], " を一覧から除外しました";
        }
            $pdo = null;
            ?>
<br /><A href="list_tar_d.php">一覧へ戻る</A><br />
    </body>
</html>
        