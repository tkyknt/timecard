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
        <title>発信器データベース</title>
    </head>
    <body> 

        <h1>発信器データベース</h1>
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
        
        echo "<h2>個体情報最終更新日：";
        $sql = $pdo->prepare("SELECT * FROM target");
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $up_date_tar[] = $row['up_date'];
        }
        echo max($up_date_tar);
        echo "</h2>";
        
        echo "<h2>発信器最終更新日：";
        $sql = $pdo->prepare("SELECT * FROM teleme");
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
        $up_date_tel[] = $row['up_date'];
        }
        echo max($up_date_tel);
        echo "</h2>";
        $pdo = null;
        ?>

        <div id="categories">
        
	<section>
	<div class="category">
            <h2><A href="list_tar.php">装着個体一覧</A></h2>
        </div>
	</section>
        <section>
	<div class="category">
            <h2><A href="teleme_search.php">装着個体情報入力</A></h2>
        </div>
	</section>
        <section>
	<div class="category">
            <h2><A href="src_tar.php">装着個体検索・編集</A></h2>
        </div>
	</section>
        <section>
	<div class="category">
            <h2><A href="src_tel.php">発信器検索・編集</A></h2>
        </div>
	</section>
        <section>
	<div class="category">
            <h2><A href="ins_tel.php">発信器情報入力</A></h2>
        </div>
        </div>
        
        <div id="stock">
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
        
        echo "<h2>発信器在庫数</h2>";
        $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE'");
        $sql->execute();
        while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
            $category[] = $row['category'];
            $cate_freq[] = $row['category'] . $row['freq'];
        }
       
        $category_c = array_count_values($category);
        $cate_freq_c = array_count_values($cate_freq);
        
        echo '<table><caption>LT</caption>';
        echo "<tr><th>ch1</th><th>ch2</th><th>ch3</th><th>ch4</th><th>ch5</th></tr>";
        echo "<tr><td>", $cate_freq_c['LTch1'], "</td>";
        echo "<td>", $cate_freq_c['LTch2'], "</td>";
        echo "<td>", $cate_freq_c['LTch3'], "</td>";
        echo "<td>", $cate_freq_c['LTch4'], "</td>";
        echo "<td>", $cate_freq_c['LTch5'], "</td></tr></table>";
        echo "ATS：", $category_c['ATS'];
 
        $pdo = null;
        ?>
            
        </div>
        
    </body>
</html>
