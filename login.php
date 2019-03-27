<?php

require_once( "include/importCore.php" );
require_once( "util/Validator.php" );


$validator = new Validator();
if (!empty($_POST)) {
    $validator->validEmailFormat(getPost(KEY_EMAIL));
    $validator->validUserIDFormat(getPost(KEY_CHARID));
    $validator->validPasswordFormat(getPost(KEY_PASSWORD));

    if ($validator->hasNoError()) {
        //エラーが無い場合  入力されたユーザー情報をDBに登録
        require_once( "core/db/table/UserTable.php" );
        $userTable = UserTable::getInstance();
        $userTable->createUser(array(
                KEY_EMAIL => getPost(KEY_EMAIL),
                KEY_CHARID => getPost(KEY_CHARID),
                KEY_PASSWORD => getPost(KEY_PASSWORD))
        );
        //ログインしてタイムラインページ表示
        header('Location:timeline.php');
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
                    <?php echoErrMsg($validator->getErrorMessageByKey(KEY_LOGINID)); ?>
                </label>
                <label class="inputWrap"><div class="label-text">パスワード</div>
                    <input type="password" name="<?php echo KEY_PASSWORD ?>" value="<?php echoPost(KEY_PASSWORD); ?>">
                    <?php echoErrMsg($validator->getErrorMessageByKey(KEY_PASSWORD)); ?>
                </label>
                <input type="submit" value="ログイン" class="btn-rr bgColor-hiwihi mt3rem">
            </form>
            <p class="fogot-password"><a href="<?= PAGE_PASS_REMINDER ?>.php">パスワードを忘れた</a></p>
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>