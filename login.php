<?php

require_once( "include/importCore.php" );
require_once( "util/Validator.php" );
require_once( "core/db/table/UserTable.php" );


$errorMsg = '';

if (!empty($_POST)) {
    //require_once( "core/Auth.php" );
    //require_once( "core/Session.php" );
    if (Auth::login(getPost(KEY_LOGINID),getPost(KEY_PASSWORD))) {
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
                <label class="inputWrap"><div class="label-text">ユーザー名 または メールアドレス</div>
                    <input type="text" name="<?php echo KEY_LOGINID ?>" value="<?php echoPost(KEY_LOGINID); ?>">
                </label>
                <label class="inputWrap"><div class="label-text">パスワード</div>
                    <input type="password" name="<?php echo KEY_PASSWORD ?>" value="<?php echoPost(KEY_PASSWORD); ?>">
                    <?php echoErrMsg($errorMsg); ?>
                </label>
                <input type="submit" value="ログイン" class="btn-rr bgColor-hiwihi mt3rem">
            </form>
<!--            <p class="fogot-password"><a href="--><?php //echo PAGE_PASS_REMINDER ?><!--.php">パスワードを忘れた</a></p>-->
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>