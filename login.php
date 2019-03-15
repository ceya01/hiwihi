
<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>

<!--  メイン -->
<main>
    <h2>ログインページ</h2>
    <p>おかえり！</p>
    <form action="" method="post">
        <label>ユーザー名 または メールアドレス<input type="text"></label><br>
        <label>パスワード<input type="text"></label><br>
        <input type="submit" value="ログイン">
    </form>
    <p><a href="<?php echo PAGE_PASS_REMINDER ?>.php">パスワードを忘れた</a></p>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>