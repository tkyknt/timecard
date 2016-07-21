<?php
session_start();
?>
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
        <title>出勤入力</title>
        <script type="text/javascript" src="cookie.js"></script>
    </head>
    <body>
        <h1>出勤入力 </h1>
        <?php
        echo "<div>",$_SESSION["name"],"<br />";
        echo date('Y年m月d日 H:i'),"</div>";
        session_destroy();
        ?>
        

        <form id="form_s" action="insert_k.php" method="post">
        <input type ="hidden" name="name" value="<?= $_SESSION["name"] ?>">
        <ul>
        <li>
        <label><span>勤怠</span>
            <input type="radio" name="syukkin" onClick="naiset()" value="内勤" id="f-kintai" checked>内勤
            <input type="radio" name="syukkin" onClick="gaiset()" value="外勤" id="f-kintai">外勤
            <input type="radio" name="syukkin" onClick="restset()" value="欠勤" id="f-kintai">欠勤
            <input type="radio" name="syukkin" onClick="restset()" value="有給" id="f-kintai">有給</label>
        </li>
        <li>
        <label><span>遅刻</span>
            <input type="checkbox" name="chikoku" value="遅刻" id="chikoku"></label>
        </li>
        <li>
        <label><span>開始時刻</span>
            <input type="time" name="time" id="f-time"><small>打刻時刻と異なる場合は入力</small></label>
        </li>
        <li>
        <label><span>出発時刻</span>
            <input type="time" name="time2" id="f-time2"><small>直行時のみ入力</small></label>
        </li>
        <li>
        <label><span>理由（遅刻、休暇等</span>
            <input type="text" name="comment" class="txtfiled" value="" id="f-comment"></label>
        </li>
        <li>    
        <label><span>主な業務予定</span>
            <select name="gname" id="f-gname">
                <option value="" selected></option>
                <option value="会社業務">会社業務</option>
                <optgroup label="サル">
                <option value="仙台市サル調査">仙台市サル調査</option>
                <option value="七ヶ宿町サル調査">七ヶ宿町サル調査</option>
                <option value="白石市サル調査">白石市サル調査</option>
                <option value="釜石市サル調査">釜石市サル調査</option>
                <option value="宮城県サル調査">宮城県サル調査</option>
                <option value="福島県サル調査">福島県サル調査</option>
                <option value="南奥羽サル調査">南奥羽サル調査</option>
                </optgroup>
                
                <optgroup label="クマ">
                <option value="仙台市クマ調査">仙台市クマ調査</option>
                <option value="宮城県クマ調査">宮城県クマ調査</option>
                <option value="宮城県クマ錯誤捕獲対応">宮城県クマ錯誤捕獲対応</option>
                </optgroup>
                
                <optgroup label="イノシシ">
                <option value="宮城県イノシシ集落ぐるみ">宮城県イノシシ集落ぐるみ</option>
                <option value="福島県イノシシ調査">福島県イノシシ調査</option>
                <option value="山形県イノシシ調査">山形県イノシシ調査</option>
                <option value="JAXAイノシシ調査">JAXAイノシシ調査</option>
                <option value="角田市イノシシ講習会">角田市イノシシ講習会</option>
                </optgroup>
                
                <optgroup label="シカ">
                <option value="早池峰シカ調査">早池峰シカ調査</option>
                <option value="白神シカ調査">白神シカ調査</option>
                <option value="ＷＭＯ研修会事業">ＷＭＯ研修会事業</option>
                <option value="環境省白神科学委員運営">環境省白神科学委員運営</option>
                <option value="東北森林管理局高度化実証事業">東北森林管理局高度化実証事業</option>
                <option value="新潟県シカイノ管理計画作成業務">新潟県シカイノ管理計画作成業務</option>
                
                </optgroup>
                
                <option value="その他">その他</option>
                <option value="山形大学Yo-coe">山形大学Yo-coe</option>
                <option value="その他研修会">その他研修会</option>
        </select></label>
        </li>
        <li>    
        <label><span>備考</span>
            <textarea name="gcomment" class="txtfiled" cols="30" rows="2" id="f-gcomment"></textarea></label>
        </li>
        <li>
             <input type="button" value="業務予定保存" onClick="setck2()">
            <input type="button" value="読込" onClick="getck2()">
        </li>
        <li>
            <input type="submit" name="submit" value="登録" />
        </li>
        </ul>
        </form>
    <A href="index.html">ホーム</A><br />
    </body>
</html>
