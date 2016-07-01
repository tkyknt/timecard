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
        <title>装着個体情報入力</title>
    </head>
    <body>
        <h1>装着個体情報入力 </h1>

        <form action="ins_tar2.php" method="post">
            
            群れ名：<select name="groupname">
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
                    echo '<option value="', $row['groups'], '">', $row['group'],'</option>';
                }
                ?>
            </select>
            
            <p>個体名：<input type="text" name="target" size="10" value="" /></p>
            <p>性別：<select name="sex">
                    <option value="♂">♂</option>
                    <option value="♀">♀</option>
                    <option value="不明">不明</option>
                </select></p>
            <p>装着日：<input type ="date" value= "<?php echo date("Y-m-d");?>" name="set_date"></p>
            <p>装着年齢：<input type="number" name="set_age" value="" /></p>
            <p>備考：<input type="text" name="target_com" size="20" value="" /></p>
            
            </form>
            <br /><A href="index.php">ホーム</A><br />
</body>
</html>

                
                
                    
                        
                
        
