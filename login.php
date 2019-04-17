<?php

require_once(dirname(__FILE__).'/include/redirect2timeline.php');
require_once( "include/importCore.php" );
require_once( "util/Validator.php" );
require_once( "core/db/table/UserTable.php" );


$errorMsg = '';

if (!empty($_POST)) {
    if (Auth::login(getPOST(KEY_LOGINID),getPOST(KEY_PASSWORD))) {
        //ログインしてタイムラインページ表示
        header('Location:timeline.php');
    }else{
        $errorMsg = 'ユーザーID、メールアドレス または パスワードが間違っています';
    }
}


?>

<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>

<!--  メイン -->
<main class="bg-hiwihiBird">
    <div class="bg-overlay">
        <div class="inner formWrap">
            <h2 class="color-hiwihi mb2rem">おかえり！</h2>
            <form action="" method="post" enctype="multipart/form-data" class="entry-form">
                <label class="inputWrap"><span class="label-text">ユーザー名 または メールアドレス</span>
                    <input type="text" name="<?php echo KEY_LOGINID ?>" value="<?php echoPost(KEY_LOGINID); ?>">
                </label>
                <label class="inputWrap"><span class="label-text">パスワード</span>
                    <input type="password" name="<?php echo KEY_PASSWORD ?>" value="<?php echoPost(KEY_PASSWORD); ?>">
                    <?php echoErrMsg($errorMsg); ?>
                </label>
                <input type="submit" value="ログイン" class="btn-rr bgColor-hiwihi mt3rem">
            </form>
<!--            パスワードリマインダー（未実装）-->
<!--            <p class="fogot-password"><a href="--><?php //echo PAGE_PASS_REMINDER ?><!--.php">パスワードを忘れた</a></p>-->
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>