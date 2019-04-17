
<!-- パスワードリマインダー（未実装）-->
<!--  ヘッダー -->
<?php
require_once(dirname(__FILE__).'/include/redirect2timeline.php');
require_once( "include/header.php" );
?>

<!--  メイン -->
<main class="bg-hiwihiBird">
    <div class="bg-overlay">
        <div class="inner formWrap">
            <h2  class="color-hiwihi mb2rem">パスワードリマインダー</h2>
            <p class="mb1rem">パスワードをリセットして、入力したメールアドレスに新パスワードを送信します。</p>
            <form action="" method="post">
                <label class="inputWrap"><span class="label-text">メールアドレス</span>
                    <input type="text" name="<?php echo KEY_EMAIL ?>" value="<?php echoPost(KEY_EMAIL); ?>">
                <input type="submit" value="メール送信" class="btn-rr bgColor-hiwihi mt1rem">
                </label>
            </form>
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>