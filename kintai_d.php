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
        <script type="text/javascript" src="cookie4.js"></script>
    </head>
    <body onLoad= "getck()">
        <h1>勤怠日付入力 </h1>

        <form id="form_s" action="insert_d.php" method="post">
            <ul>
                <li>
                    <label><span>名前</span>
                        <select name="name">
                            <option value="宇野壮春" selected>宇野壮春</option>
                            <option value="関健太郎">関健太郎</option>
                            <option value="三木清雅" >三木清雅</option>
                            <option value="鈴木淳">鈴木淳</option>
                            <option value="瀬戸秀穂">瀬戸秀穂</option>
                            <option value="橋本光平">橋本光平</option>
                            <option value="伊左治美奈">伊左治美奈</option>
                            <option value="木野田拓也">木野田拓也</option>
                        </select></label>
                </li>
                <li>
                    <label><span>日付</span>
                        <input type ="date" value= "<?php echo date("Y-m-d");?>" name="date"></label>
                </li>
                <li>
                <label><span>勤怠</span>
                    <input type="radio" name="syukkin" onClick="naiset()" value="内勤" checked>内勤
                    <input type="radio" name="syukkin" onClick="gaiset()" value="外勤" >外勤
                    <input type="radio" name="syukkin" onClick="restset()" value="欠勤" >欠勤
                    <input type="radio" name="syukkin" onClick="restset()" value="有給" >有給</label>
                </li>
                <li>
                    <label><span>遅刻</span>
                        <input type="checkbox" name="chikoku" value="遅刻"></label>
                </li>
                <li>
                    <label><span>早退</span>
                        <input type="checkbox" name="soutai" value="早退"></label>
                </li>
                <li>
                    <label><span>開始時刻</span>
                        <input type="time" name="time"></label>
                </li>
                <li>
                    <label><span>出発時刻</span>
                        <input type="time" name="time2" value= "" readonly><small>（直行の場合入力）</small></label>
                </li>
                <li>
                    <label><span>退勤時刻</span>
                        <input type="time" name="time_t"></label>
                </li>
                <li>
                    <label><span>到着時刻</span>
                        <input type="time" value= "" name="time_c"><small>（直帰・現場泊の場合入力）</small></label>
                </li>
                <li>
                    <label><span>理由欄（遅刻、休暇等</span>
                        <input type="text" name="comment" size="30" value="" /></label>
                </li>
                <li>
                    <label><span>理由（早退、外出等）</span>
                        <input type="text" name="comment_t" size="30" value="" /></label>
                </li>
                <li>
                    <label><span>外出</span>
                        <input type="time" name="time_go">～
            <input type="time" name="time_gi"></label>
                </li>
                <li>
                    <label><span>主な業務</span>
                        <select name="gname">
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
                                <option value="JAXAイノシシ調査">JAXAイノシシ調査</option>
                                <option value="角田市イノシシ講習会">角田市イノシシ講習会</option>
                            </optgroup>
                            <optgroup label="シカ">
                                <option value="早池峰シカ調査">早池峰シカ調査</option>
                                <option value="白神シカ調査">白神シカ調査</option>
                                <option value="環境省シカ調査">環境省シカ調査</option>
                                <option value="ＷＭＯ研修会事業">ＷＭＯ研修会事業</option>
                                <option value="環境省白神科学委員運営">環境省白神科学委員運営</option>
                            </optgroup>
                            <option value="その他">その他</option>
                        </select></label>
                </li>
                <li>
                    <label><span>内容</span>
                        <textarea name="gcomment" cols="30" rows="2"></textarea></label>
                </li>
                <li>
                    <input type="button" value="内容保存" onClick="setck_d()">
                    <input type="button" value="読込" onClick="getck_d()">
                </li>
                <li>
            <input type="submit" name="submit"  onClick="setck()" value="登録" />
                </li>
            </ul>
        </form>
    <p><A href="index.html">ホーム</A></p>

    </body>
</html>
