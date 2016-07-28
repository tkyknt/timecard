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
        <title>個体情報編集</title>
    </head>
    <body>
        <h1>個体情報編集 </h1>
        <form action="upd_tar1.php" method="post">
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
            $groups[] = $row['group'];
        }
        $sql = $pdo->prepare("SELECT * FROM target WHERE target_id = :target_id");
        $sql ->bindValue(':target_id', $_POST['target_id']);
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            echo '<p>個体id', $row['target_id'];
            echo '<input type="text" name="target_id" size="3" value="', $_POST['target_id'], '" hidden>';
            
            echo '群れ名：<select name="groups">';
            foreach($groups as $value){
                echo '<option value="', $value, '"';
                if($value == $row['groups']){
                    echo ' selected';
                }
                    echo '>', $value, '</option>';
            }
            echo '</select>';
            
            echo '<p>個体名：<input type="text" name="target" size="10" value="',
                    $row['target'], '"></p>';
            
            $selection = array('♂','♀', '？');
            echo '<p>性別：<select name="sex">';
            foreach($selection as $value){
                echo '<option value="', $value, '"';
                if($row['sex'] == $value){
                    echo ' selected';
                }
                echo '>', $value, '</option>';
            }
            echo '</select></p>';            
            
            echo '<p>装着年月日：<input type="date" name="set_date" value="',
                    $row['set_date'], '"></p>';
            
            echo '<p>装着年齢：<input type="text" name="set_age" size="5" value="',
                    $row['set_age'], '"></p>';
            
            echo '<p>備考：<input type="text" name="target_com" size="20" value="',
                    $row['target_com'], '"></p>';
            
            $selection = array('○','△', '×', '×？', '？');
            echo '<p>受信感度：<select name="sens">';
            foreach($selection as $value){
                echo '<option value="', $value, '"';
                if($row['sens'] == $value){
                    echo ' selected';
                }
                echo '>', $value, '</option>';
            }
            echo '</select></p>';
            echo '<p>最適周波数：<input type="text" name="freq_s" size="10" value="',$row['freq'], '" ><br>'
                    , '<small>※一覧に発信器の登録周波数と異なる周波数を表示したい場合のみ編集。ここを変更しても発信器の登録周波数は変わらない</small></p>';
            echo '<p>発信器ID：',$row['tel_id'], '</p>';
            echo '<input type="text" name="tel_id" size="3" value="', $row['tel_id'], '" hidden>';
            $selection = array('LT','ATS', 'GPS', 'その他');
            echo '<p>種類：<select name="category">';
            foreach($selection as $value){
                echo '<option value="', $value, '"';
                if($row['category'] == $value){
                    echo ' selected';
                }
                echo '>', $value, '</option>';
            }
            echo '</select></p>';

            echo '<p>デジタルID：<input type="text" name="digi_id" size="10" value="',
                    $row['digi_id'], '"></p>';
            
            echo '<p>ベルト：<input type="text" name="belt" size="5" value="',
                    $row['belt'], '"></p>';
            echo '<p>電池：<input type="text" name="battery" size="5" value="',
                    $row['battery'], '"></p>';
            echo '<p>アンテナ：<input type="text" name="antenna" size="5" value="',
                    $row['antenna'], '"></p>';
            
            echo '<p>一覧に表示：する<input type="radio" name="list_disp" value="TRUE" ';
            if($row['list_disp'] == "TRUE"){echo 'checked';}
            echo '/>';
            echo 'しない<input type="radio" name="list_disp" value="FALSE" ';
            if($row['list_disp'] == "FALSE"){echo 'checked';}
            echo '/></p>';
            
            echo '<p>最終更新日：',$row['up_date'], '</p>';
        }
        $pdo = null;
                ?>
        <input type="submit" name="submit" value="更新" />
        </form>
        <br /><A href="index.php">ホーム</A><br />
    </body>
</html>