<!DOCTYPE html>
<html>
<head> 
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=4.0, user-scalable=yes">
        <link rel="stylesheet" media="all" type="text/css" href="css/pc.css" />
        <!-- ※デフォルトのスタイル（style.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
        <!-- ※タブレット用のスタイル（tablet.css） -->
        <link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
        <title>発信器検索結果</title>
</head>
<body>
    <h1>発信器検索結果</h1>
    
<?php
mb_language("ja");
mb_internal_encoding("UTF-8");
require_once 'DSN.php';
$pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
$st = $pdo -> query("SET NAMES utf8;");

echo "<table>
    <tr>
    <th>ID</th><th>種類</th><th>周波数（ch）</th><th>シリアルNo.</th><th>デジタルID</th>
    <th>ベルト</th><th>バッテリー</th><th>アンテナ</th><th>発信間隔k</th><th>購入日</th><th>購入元</th>
    <th>製造日</th><th>備考1</th><th>備考2</th><th>使用期間</th><th>更新日</th><th>選択</th></tr>";

if($_POST['category'] == "LT"){
    if(!empty($_POST['ch'])){
        if(!empty($_POST['digi_id'])){
            $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category AND freq = :ch AND digi_id = :digi_id");
            $sql ->bindValue(':category', $_POST['category']);
            $sql ->bindValue(':ch', $_POST['ch']);
            $sql ->bindValue(':digi_id', $_POST['digi_id']);
        }else{
            $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category AND freq = :ch");
            $sql ->bindValue(':category', $_POST['category']);
            $sql ->bindValue(':ch', $_POST['ch']);
        }
    }else{
        $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category");
        $sql ->bindValue(':category', $_POST['category']);
        }
}elseif($_POST['category'] == "ATS"){
    if(!empty($_POST['freq'])){
        $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category AND freq LIKE :freq");
        $freq = $_POST['freq'] . "%";
        $sql ->bindValue(':category', $_POST['category']);
        $sql ->bindValue(':freq', $freq);
    }else{
        $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category");
        $sql ->bindValue(':category', $_POST['category']);
    }
}elseif($_POST['category'] == "GPS"){
    if(!empty($_POST['digi_id'])){
        $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category AND digi_id = :digi_id");
        $sql ->bindValue(':category', $_POST['category']);
        $sql ->bindValue(':digi_id', $_POST['digi_id']);
    }else{
        $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category");
        $sql ->bindValue(':category', $_POST['category']);
    }
}elseif($_POST['category'] == "その他"){
    $sql = $pdo->prepare("SELECT * FROM teleme WHERE stock = 'TRUE' AND category = :category");
    $sql ->bindValue(':category', $_POST['category']);
}

$sql->execute();
while($row = $sql->fetch(PDO::FETCH_ASSOC) ){
    echo "<tr><td>", $row['tel_id'], "</td>";
    echo "<td>", $row['category'], "</td>";
    echo "<td>", $row['freq'], "</td>";
    echo "<td>", $row['sn'], "</td>";
    echo "<td>", $row['digi_id'], "</td>";
    echo "<td>", $row['belt'], "</td>";
    echo "<td>", $row['battery'], "</td>";
    echo "<td>", $row['antenna'], "</td>";
    echo "<td>", $row['sig_freq'], "</td>";
    echo "<td>", $row['buy_date'], "</td>";
    echo "<td>", $row['store'], "</td>";
    echo "<td>", $row['pro_date'], "</td>";
    echo "<td>", $row['tele_com1'], "</td>";
    echo "<td>", $row['tele_com2'], "</td>";
    echo "<td>", $row['duration'], "</td>";
    echo "<td>", $row['update'], "</td>";
    echo '<form action="ins_tar.php" method="post">';
    echo '<input type="hidden" name="tel_id" value="', $row['tel_id'], '">';
    echo '<td><input type="submit" value="選択">';
    echo '</form></td></tr>';
}

$pdo = null;
?>
    <p><A href="check_f.php">入力チェック</A></p>
    <p><A href="index.html">ホーム</A></p>
</body>
</html>