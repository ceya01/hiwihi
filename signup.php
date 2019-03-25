

<?php

require_once( "include/importCore.php" );
require_once( "util/Validator.php" );


$validator = new Validator();
if(!empty($_POST)){
    $validator->validEmailFormat(getPost(KEY_EMAIL));
    $validator->validUserIDFormat(getPost(KEY_CHARID));
    $validator->validPasswordFormat(getPost(KEY_PASSWORD));

    if($validator->hasNoError() ){
        //エラーが無い場合  入力されたユーザー情報をDBに登録
        require_once( "core/db/table/UserTable.php" );
        $userTable = UserTable::getInstance();
        $userTable->createUser(array(
                KEY_EMAIL=>getPost(KEY_EMAIL),
                KEY_CHARID=>getPost(KEY_CHARID),
                KEY_PASSWORD=>getPost(KEY_PASSWORD))
        );
    }
}
?>

<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>

<!--  メイン -->
<main>
    <h2>新規登録ページ</h2>
    <p>ようこそ！</p>
    <form action="" method="post" enctype="multipart/form-data" class="entry-form">
        <label class="wrap-inpput"><span class="label-text">メールアドレス</span>
            <input type="text" name="<?php echo KEY_EMAIL ?>" value="<?php echoPost(KEY_EMAIL); ?>">
            <?php echoErrMsg($validator->getErrorMessageByKey(KEY_EMAIL)); ?>
        </label>
        <label class="wrap-inpput"><span class="label-text">ユーザーID</span>
            <input type="text" name="<?php echo KEY_CHARID ?>" value="<?php echoPost(KEY_CHARID); ?>">
            <?php echoErrMsg($validator->getErrorMessageByKey(KEY_CHARID)); ?>
        </label>
        <label class="wrap-inpput"><span class="label-text">パスワード</span>
            <input type="password" name="<?php echo KEY_PASSWORD ?>" value="<?php echoPost(KEY_PASSWORD); ?>">
            <?php echoErrMsg($validator->getErrorMessageByKey(KEY_PASSWORD)); ?>
        </label>
        <input type="submit" value="新規登録">
    </form>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>