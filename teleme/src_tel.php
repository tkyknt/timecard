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
        <title>発信器検索</title>
        <script type="text/javascript" src="cookie4.js"></script>
    </head>
    <body onLoad= "getck()">
        <h1>発信器検索 </h1>
        
        <form action="src_tel1.php" method="post">
            
            <p>種類：
            <select name="category">
                <option value="LT" selected>LT</option>
                <option value="ATS">ATS</option>
                <option value="GPS" >GPS</option>
                <option value="その他">その他</option>
            </select></p>
            
            <p>チャンネル ch1<input type="radio" name="ch" value="ch1" />
                ch2<input type="radio" name="ch" value="ch2" />
                ch3<input type="radio" name="ch" value="ch3" />
                ch4<input type="radio" name="ch" value="ch4" />
                ch5<input type="radio" name="ch" value="ch5" /></p>
            
            <p>ID<input type="text" name="digi_id" size="10" value="" /></p>
            <p>周波数<input type="text" name="freq" size="10" value="" /></p>
            <p>在庫ありのみ<input type="radio" name="stock" value="TRUE" />
                在庫無しも全て<input type="radio" name="stock" value="FALSE" /></p>
            <input type="submit" name="submit" value="検索" />
        </form>
        
        <p><A href="index.html">ホーム</A></p>

    </body>
</html>
