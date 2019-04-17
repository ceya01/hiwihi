<!--  ヘッダー -->
<?php

require_once(dirname(__FILE__).'/include/redirect2timeline.php');
require_once( "include/header.php" );
?>

<!--  メイン -->
<main class="bg-hiwihiBird">
    <div class="bg-overlay">
        <div class="inner formWrap">
            <img src="img/icon.png" alt="ﾋｳｨｯﾋﾋｰ アイコン" class="hiwihi-icon">
            <h2>いま、なにしてる？<br><span class="color-hiwihi">ﾋｳｨｯﾋﾋｰ</span> やってる！</h2>
            <a href="signup.php" class="btn-rr white bgColor-hiwihi border-white">アカウント作成</a>
            <a href="login.php" class="btn-rr color-hiwihi bgColor-white border-hiwihi">ログイン</a>

            <h3 class="mt3rem">ゲストとしてログイン</h3>
            <ul class="guestList">
                <li><a href="guestLogin.php?g=1">ゲストユーザー１</a></li>
                <li><a href="guestLogin.php?g=2">ゲストユーザー２</a></li>
                <li><a href="guestLogin.php?g=3">ゲストユーザー３</a></li>
            </ul>
        </div>
        <div class="introWrap">
            <h2 class="iconHead color-hiwihi">「ﾋｳｨｯﾋﾋｰ」 ってなに？</h2>
            <?php include( "include/about_text.php" ); ?>
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>