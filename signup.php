<?php

require_once(dirname(__FILE__).'/include/redirect2timeline.php');
require_once( "include/importCore.php" );
require_once( "util/Validator.php" );


$validator = new Validator();
if (!empty($_POST)) {
    $validator->validEmail(getPOST(KEY_EMAIL));
    $validator->validUserID(getPOST(KEY_CHARID));
    $validator->validPasswordFormat(getPOST(KEY_PASSWORD));

    if ($validator->hasNoError()) {
        //エラーが無い場合  入力されたユーザー情報をDBに登録
        require_once( "core/db/table/UserTable.php" );
        //$userTable = UserTable::getInstance();
        $id = UserTable::createUser(array(
                KEY_EMAIL => getPOST(KEY_EMAIL),
                KEY_CHARID => getPOST(KEY_CHARID),
                KEY_PASSWORD => getPOST(KEY_PASSWORD))
        );
        //ログインしてタイムラインページ表示
        Session::setLoginUserID($id);
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
            <h2 class="color-hiwihi mb2rem">ようこそ！</h2>
            <form action="" method="post" enctype="multipart/form-data" class="entry-form">
                <label class="inputWrap"><span class="label-text">メールアドレス</span>
                    <input type="text" name="<?php echo KEY_EMAIL ?>" value="<?php echoPost(KEY_EMAIL); ?>">
                    <?php echoErrMsg($validator->getErrorMessageByKey(KEY_EMAIL)); ?>
                </label>
                <label class="inputWrap"><span class="label-text">ユーザーID</span>
                    <input type="text" name="<?php echo KEY_CHARID ?>" value="<?php echoPost(KEY_CHARID); ?>">
                    <?php echoErrMsg($validator->getErrorMessageByKey(KEY_CHARID)); ?>
                </label>
                <label class="inputWrap"><span class="label-text">パスワード</span>
                    <input type="password" name="<?php echo KEY_PASSWORD ?>" value="<?php echoPost(KEY_PASSWORD); ?>">
                    <?php echoErrMsg($validator->getErrorMessageByKey(KEY_PASSWORD)); ?>
                </label>
                <input type="submit" value="新規登録" class="btn-rr bgColor-hiwihi mt3rem">
            </form>
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>