<html lang="ja">
    <head>
        <meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=4.0, user-scalable=yes">
        <link rel="stylesheet" media="all" type="text/css" href="css/pc.css" />
        <!-- ※デフォルトのスタイル（style.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
        <!-- ※タブレット用のスタイル（tablet.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
        <!-- ※スマートフォン用のスタイル（smart.css） -->
        <title>個体検索</title>
        <script type="text/javascript" src="cookie4.js"></script>
    </head>
    <body>
        <h1>個体検索 </h1>
        
        <form action="src_tar1.php" method="post">
            
            <p>群れ名：<select name="groupname">
                    <option value="" selected></option>
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
                $sql = $pdo->prepare("SELECT * FROM groups ORDER BY group_id");
                $sql->execute();
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value="', $row['group'], '">', $row['group'],'</option>';
                }
                $pdo = null;
                ?>
            </select></p>
            
            <p>個体名：<input type="text" name="target" size="10" value="" /></p>

            <p>発信中のみ<input type="radio" name="sens" value="TRUE" checked/>
                登録全個体<input type="radio" name="sens" value="FALSE" /></p>
            <input type="submit" name="submit" value="検索" />
        </form>
        
        <p><A href="index.php">ホーム</A></p>

    </body>
</html>
