<?php
session_start();
?>
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
        <title>退勤入力</title>
</head>
<body>
<?php
echo "<div id='header'>",$_SESSION["name"],"<br />";
echo "現在時刻：",date('Y年m月d日 H:i');
echo "<br />本日の出勤時刻：",date("H：i", strtotime($_SESSION["time"])),"</div>";
$name = $_SESSION["name"];
$date = $_SESSION["date"];
$id = $_SESSION["id"];
session_destroy();
?>
    <h1>退勤入力</h1>
   <form id="form_s" action="update_k.php" method="post">
       <input type ="hidden" name="name" value="<?= $name ?>">
       <input type ="hidden" name="date" value="<?=  $date ?>">
       <input type ="hidden" name="id" value="<?=  $id ?>">
       <ul>
           <li>
               <label><span>退勤時刻</span>
                   <input type="time" name="time_t"><small>打刻時刻と異なる場合入力</small></label>
           </li>
           <li>
               <label><span>到着時刻</span>
                   <input type="time" value= "" name="time_c"><small>直帰・現地泊の場合入力</small></label>
           </li>
           <li>
               <label><span>早退</span>
                   <input type="checkbox" name="soutai" value="早退"></label>
           </li>
           <li>
               <label><span>理由（早退、外出等）</span>
                   <input type="text" name="comment_t" size="30" value="" /></label>
           </li>
           <li>
            <input type="submit" name="submit" value="退勤" />
           </li>
       </ul>
   </form>
    
    <h1>外出（業務外）入力</h1>
    <form id="form_s" action="update_g.php" method="post">
       <input type ="hidden" name="name" value="<?= $name ?>">
       <input type ="hidden" name="date" value="<?=  $date ?>">
       <input type ="hidden" name="id" value="<?=  $id ?>">
       <ul>
           <li>
               <label><span>時刻</span>
                   <input type="time" name="time_go">～<input type="time" name="time_gi"></label>
           </li>
           <li>
            <input type="submit" name="submit" value="外出" />
           </li>
       </ul>
       </form>
        <A href="index.html">ホーム</A><br />
    </body>
</html>