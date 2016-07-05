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
        <title>発信器情報入力</title>
    </head>
    <body>
        <h1>発信器情報入力 </h1>
        
        <form action="ins_tel2.php" method="post">
            <p>種類：
            <select name="category">
                <option value="LT" selected>LT</option>
                <option value="ATS">ATS</option>
                <option value="GPS" >GPS</option>
                <option value="その他">その他</option>
            </select></p>
            <p>チャンネル： ch1<input type="radio" name="ch" value="ch1" />
                ch2<input type="radio" name="ch" value="ch2" />
                ch3<input type="radio" name="ch" value="ch3" />
                ch4<input type="radio" name="ch" value="ch4" />
                ch5<input type="radio" name="ch" value="ch5" /></p>
            <p>デジタルID：<input type="text" name="digi_id" size="10" value="" ></p>
            <p>シリアルNo.：<input type="text" name="sn" size="10" value="" ></p>
            <p>アナログ周波数：<input type="text" name="freq" size="10" value="" /></p>
            <p>ベルト：<input type="text" name="belt" size="5" value="" ></p>
            <p>電池：<input type="text" name="battery" size="5" value="" ></p>
            <p>アンテナ：<input type="text" name="antenna" size="5" value="" ></p>
            <p>発信間隔：<input type="text" name="sig_freq" size="2" value="" ></p>
            <p>購入日：<input type="date" name="buy_date" value="" ></p>
            <p>購入元：<input type="text" name="store" size="5" value="" ></p>
            <p>製造日：<input type="date" name="pro_date" value="" ></p>
            <p>備考1：<input type="text" name="tele_com1" size="30" value="" ></p>
            <p>備考2：<input type="text" name="tele_com2" size="30" value="" ></p>
            <p>使用期間（日）：<input type="text" name="duration" size="5" value="" ></p>
            <input type="submit" name="submit" value="登録" />
        </form>
        
        <br /><A href="index.php">ホーム</A><br />
    </body>
</html>
