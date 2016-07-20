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
        <title>装着個体情報入力確認</title>
    </head>
    <body>
        <h1>装着個体情報入力確認</h1>
        <?php
        echo '<p>群れ名：', $_POST['groupname'], '</p>';
        echo '<p>個体名：', $_POST['target'], '</p>';
        echo '<p>性別：', $_POST['sex'], '</p>';
        echo '<p>装着日：', $_POST['set_date'], '</p>';
        echo '<p>装着年齢：', $_POST['set_age'], '</p>';
        echo '<p>受信感度：', $_POST['sens'], '</p>';
        echo '<p>備考：', $_POST['target_com'], '</p>';
        echo '<p>一覧に表示：', $_POST['list_disp'], '</p><br>';
        
        echo '<p>発信器ID：', $_POST['tel_id'], '</p>';
        echo '<p>種類：', $_POST['category'], '</p>';
        echo '<p>周波数：', $_POST['freq'], '</p>';
        echo '<p>シリアルNo.：', $_POST['sn'], '</p>';
        echo '<p>デジタルID：', $_POST['digi_id'], '</p>';
        echo '<p>ベルト：', $_POST['belt'], '</p>';
        echo '<p>電池：', $_POST['battery'], '</p>';
        echo '<p>アンテナ：', $_POST['antenna'], '</p>';
        echo '<p>発信間隔：', $_POST['sig_freq'], '</p>';
        echo '<p>購入日：', $_POST['buy_date'], '</p>';
        echo '<p>購入元：', $_POST['store'], '</p>';
        echo '<p>製造日：', $_POST['pro_date'], '</p>';
        echo '<p>備考1：', $_POST['tele_com1'], '</p>';
        echo '<p>備考2：', $_POST['tele_com2'], '</p>';
        echo '<p>使用期間：', $_POST['duration'], '</p>';
        echo "<h3>これで登録しますか</h>";
        echo '<form action="ins_tar2.php" method="post">';
         echo '<input type="hidden" name="groupname" value="', $_POST['groupname'], '">';
        echo '<input type="hidden" name="target" value="', $_POST['target'], '">';
        echo '<input type="hidden" name="sex" value="', $_POST['sex'], '">';
        echo '<input type="hidden" name="set_date" value="', $_POST['set_date'], '">';
        echo '<input type="hidden" name="set_age" value="', $_POST['set_age'], '">';
        echo '<input type="hidden" name="sens" value="', $_POST['sens'], '">';
        echo '<input type="hidden" name="target_com" value="', $_POST['target_com'], '">';
        echo '<input type="hidden" name="list_disp" value="', $_POST['list_disp'], '">';
        echo '<input type="hidden" name="tel_id" value="', $_POST['tel_id'], '">';
        echo '<input type="hidden" name="category" value="', $_POST['category'], '">';
        echo '<input type="hidden" name="freq" value="', $_POST['freq'], '">';
        echo '<input type="hidden" name="sn" value="', $_POST['sn'], '">';
        echo '<input type="hidden" name="digi_id" value="', $_POST['digi_id'], '">';
        echo '<input type="hidden" name="belt" value="', $_POST['belt'], '">';
        echo '<input type="hidden" name="battery" value="', $_POST['battery'], '">';
        echo '<input type="hidden" name="antenna" value="', $_POST['antenna'], '">';
        echo '<input type="hidden" name="sig_freq" value="', $_POST['sig_freq'], '">';
        echo '<input type="hidden" name="buy_date" value="', $_POST['buy_date'], '">';
        echo '<input type="hidden" name="store" value="', $_POST['store'], '">';
        echo '<input type="hidden" name="pro_date" value="', $_POST['pro_date'], '">';
        echo '<input type="hidden" name="tele_com1" value="', $_POST['tele_com1'], '">';
        echo '<input type="hidden" name="tele_com2" value="', $_POST['tele_com2'], '">';
        echo '<input type="hidden" name="duration" value="', $_POST['duration'], '">';
        echo '<input type="hidden" name="up_date" value="', $_POST['up_date'], '">';
        ?>
       <input type="submit" value="登録">
        <input type="submit" name="submit" value="戻る" onClick="form.action='ins_tar.php';return true">
        </form>
        </body>
</html>

                
                
                    
                        
                
        
