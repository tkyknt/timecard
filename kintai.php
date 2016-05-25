<?php
session_start();
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    require_once 'DSN.php';
    $pdo = new PDO($dsn['host'], $dsn['user'],$dsn['pass']);
    $sql = $pdo -> query("SET NAMES utf8;");
    
//本日の入力を抽出
    $sql = $pdo->prepare("SELECT * FROM kintai WHERE name = ? AND date = ?");
    $sql -> execute(array($_POST['name'], date('Y-m-d')));

    $ct = 0;
    while ($rows = $sql->fetch(PDO::FETCH_ASSOC)){
        $_SESSION["id"] = $rows["id"];
        $_SESSION["ddate"] = $rows["ddate"];
        $_SESSION["time"] = $rows["time"];
        $_SESSION["syukkin"] = $rows["syukkin"];
        $_SESSION["chikoku"] = $rows["chikoku"];
        $_SESSION["comment"] = $rows["comment"];
        $ct++;
        }
$pdo = null;

    $_SESSION["name"] = $_POST['name'];
    $_SESSION["date"] = date('Y-m-d');
    
//もし入力なければ、kintai_s.phpへ、それ以外はkintai_t.phpへ
if ($ct == 0 ) {
    header('Location: kintai_s.php');
}else{
    header('Location: kintai_t.php');
exit();
}
?>