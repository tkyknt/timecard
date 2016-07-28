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

        <form action="ins_tar1.php" method="post">
            <fieldset>
            <legend><個体情報</legend>
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

                if($_POST['target']){
                    $target = $_POST['target'];
                    $sex = $_POST['sex'];
                    $set_date = $_POST['set_date'];
                    $set_age = $_POST['set_age'];
                    $sens = $_POST['sens'];
                    $target_com = $_POST['target_com'];
                    $list_disp = $_POST['list_disp'];
                    $tel_id = $_POST['tel_id'];
                    
                    $category = $_POST['category'];
                    $freq = $_POST['freq'];
                    $sn = $_POST['sn'];
                    $digi_id = $_POST['digi_id'];
                    $belt = $_POST['belt'];
                    $battery = $_POST['battery'];
                    $antenna = $_POST['antenna'];
                    $sig_freq = $_POST['sig_freq'];
                    $buy_date = $_POST['buy_date'];
                    $store = $_POST['store'];
                    $pro_date = $_POST['pro_date'];
                    $tele_com1 = $_POST['tele_com1'];
                    $tele_com2 = $_POST['tele_com2'];
                    $duration = $_POST['duration'];
                    $up_date = $_POST['up_date'];
                }else{
                $sql = $pdo->prepare("SELECT * FROM teleme WHERE tel_id = :tel_id");
                $sql ->bindValue(':tel_id', $_POST['tel_id']);
                $sql->execute();
                while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                    $category = $row['category'];
                    $freq = $row['freq'];
                    $sn = $row['sn'];
                    $digi_id = $row['digi_id'];
                    $belt = $row['belt'];
                    $battery = $row['battery'];
                    $antenna = $row['antenna'];
                    $sig_freq = $row['sig_freq'];
                    $buy_date = $row['buy_date'];
                    $store = $row['store'];
                    $pro_date = $row['pro_date'];
                    $tele_com1 = $row['tele_com1'];
                    $tele_com2 = $row['tele_com2'];
                    $duration = $row['duration'];
                    $up_date = $row['up_date'];
                    
                    $target = "";
                    $sex = "";
                    $set_date = "";
                    $set_age = "";
                    $sens = "";
                    $target_com = "";
                    $list_disp = "";
                    $tel_id = "";
                }
                }

                $sql = $pdo->prepare("SELECT * FROM groups ORDER BY group_id");
                    $sql->execute();
                    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="', $row['group'], '">', $row['group'],'</option>';
                    }
                $pdo = null;
                ?>
            </select>
            
            <p>個体名：<input type="text" name="target" size="10" value="<?php echo $target;?>" /></p>
            <p>性別：<select name="sex">
                    <option value="♂" <?php if($sex == "♂"){echo 'selected';}?>>♂</option>
                    <option value="♀" <?php if($sex == "♀"){echo 'selected';}?>>♀</option>
                    <option value="不明" <?php if($sex == "不明"){echo 'selected';}?>>不明</option>
                </select></p>
            <p>装着日：<input type ="date" value= "<?php echo $set_date;?>" name="set_date"></p>
            <p>装着年齢：<input type="number" name="set_age" value="<?php echo $set_age;?>" /></p>
            <p>受信感度：<select name="sens">
                    <option value="○" <?php if($sens == "○"){echo 'selected';}?>>○</option>
                    <option value="△" <?php if($sens == "△"){echo 'selected';}?>>△</option>
                    <option value="×" <?php if($sens == "×"){echo 'selected';}?>>×</option>
                    <option value="×？" <?php if($sens == "×？"){echo 'selected';}?>>×？</option>
                    <option value="不明" <?php if($sens == "不明"){echo 'selected';}?>>不明</option>
            </select></p>
            <p>最適周波数：<input type="text" name="freq_s" size="10" value="" ><small>※一覧に登録周波数と異なる周波数を表示したい場合のみ入力</small></p>
            <p>備考：<input type="text" name="target_com" size="20" value="<?php echo $target_com;?>" /></p>
            <p>一覧に表示：する<input type="radio" name="list_disp" value="TRUE" <?php if($list_disp == "TRUE" or empty($list_disp)){echo 'checked';}?>/>
                しない<input type="radio" name="list_disp" value="FALSE" <?php if($list_disp == "FALSE"){echo 'checked';}?>/></p>
        </fieldset>
        
        <fieldset>
            <legend>発信器情報</legend>
            <input type="text" name="tel_id" size="3" value="<?php echo $_POST['tel_id'];?>" hidden>
            <p>発信器ID：<?php echo $_POST['tel_id'];?></p>
            <p>種類：<input type="text" name="category" size="5" value="<?php echo $category;?>" ></p>
            <p>周波数：<input type="text" name="freq" size="10" value="<?php echo $freq;?>" ></p>
            <p>シリアルNo.：<input type="text" name="sn" size="10" value="<?php echo $sn;?>" ></p>
            <p>デジタルID：<input type="text" name="digi_id" size="10" value="<?php echo $digi_id;?>" ></p>
            <p>ベルト：<input type="text" name="belt" size="5" value="<?php echo $belt;?>" ></p>
            <p>電池：<input type="text" name="battery" size="5" value="<?php echo $battery;?>" ></p>
            <p>アンテナ：<input type="text" name="antenna" size="5" value="<?php echo $antenna;?>" ></p>
            <p>発信間隔：<input type="text" name="sig_freq" size="2" value="<?php echo $sig_freq;?>" ></p>
            <p>購入日：<input type="date" name="buy_date" value="<?php echo $buy_date;?>" ></p>
            <p>購入元：<input type="text" name="store" size="5" value="<?php echo $store;?>" ></p>
            <p>製造日：<input type="date" name="pro_date" value="<?php echo $pro_date;?>" ></p>
            <p>備考1：<input type="text" name="tele_com1" size="30" value="<?php echo $tele_com1;?>" ></p>
            <p>備考2：<input type="text" name="tele_com2" size="30" value="<?php echo $tele_com2;?>" ></p>
            <p>使用期間：<input type="text" name="duration" size="5" value="<?php echo $duration;?>" ></p>
            <p>情報更新日：<?php echo $up_date;?></p>
            <input type="hidden" name="up_date" value="<?php $up_date;?>">
        </fieldset>
        <input type="submit" name="submit" value="登録" />
        </form>
            <br /><A href="index.php">ホーム</A><br />
</body>
</html>

                
                
                    
                        
                
        
