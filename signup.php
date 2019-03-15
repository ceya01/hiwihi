

<?php

require_once( "include/importCore.php" );
require_once( "core/Validator.php" );

$validator = new Validator();
if(!empty($_POST)){
    $validator->validEmailFormat($_POST[KEY_EMAIL]);
    $validator->validUserIDFormat($_POST[KEY_USERID]);
    $validator->validPasswordFormat($_POST[KEY_PASSWORD]);
}
dump($validator);
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
            <input type="text" name="<?php echo KEY_USERID ?>" value="<?php echoPost(KEY_USERID); ?>">
            <?php echoErrMsg($validator->getErrorMessageByKey(KEY_USERID)); ?>
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