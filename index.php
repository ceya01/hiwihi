

<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>

<!--  メイン -->
<main class="bg-hiwihiBird">
    <div class="bg-overlay">
        <div class="inner introCont">
            <!--    <h2>トップページ</h2>     -->
<!--            <div class="introCont">-->
                <img src="img/icon.png" alt="ﾋｩｲｯﾋﾋｰ アイコン" class="hiwihi-icon">
            <h2>いま、なにしてる？<br><span class="color-hiwihi">ﾋｩｲｯﾋﾋｰ</span> やってる！</h2>
            <a href="signup.php" class="btn-rr white bgColor-hiwihi border-white">アカウント作成</a>
            <a href="login.php" class="btn-rr color-hiwihi bgColor-white border-hiwihi">ログイン</a>


            <div class="subContent">
                <h2 class="iconHead color-hiwihi">「ﾋｩｲｯﾋﾋｰ」 ってなに？</h2>
                <?php include( "include/about_text.php" ); ?>
            </div>
<!--            </div>-->
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>