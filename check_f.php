<!DOCTYPE html>
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
        <script type="text/javascript" src="cookie.js"></script>
        <title>入力チェック</title>
    </head>
    <body onLoad= "getck()"> 
       <h1>入力チェック</h1>
        <form action="check.php" method="post">
            名前：
            <select name="name">
                <option value="宇野壮春">宇野壮春</option>
                <option value="関健太郎">関健太郎</option>
                <option value="三木清雅" >三木清雅</option>
                <option value="鈴木淳">鈴木淳</option>
                <option value="瀬戸秀穂">瀬戸秀穂</option>
                <option value="橋本光平">橋本光平</option>
                <option value="伊左治美奈">伊左治美奈</option>
                <option value="木野田拓也">木野田拓也</option>
            </select><br />
            確認したい月：<input type="month" value ="<?php echo date("Y-m"); ?>"
                          name="month"><br />

           <input type="submit" name="submit" onClick="setck()" value="抽出" /><br />
            </form>
        <A href="index.html">ホーム</A><br />
    </body>
</html>