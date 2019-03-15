
<?php
    if(!empty($_POST)){

    }
?>



<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>

<!--  メイン -->
<main>
    <h2>新規登録ページ</h2>
    <p>ようこそ！</p>
    <form action="" method="post" enctype="multipart/form-data">
        <label>メールアドレス
            <input type="text" name="email" value="<?= echoPost('email'); ?>"></label>
        <label>ユーザーID
            <input type="text" name="userid" value="<?= echoPost('userid'); ?>"></label>
        <label>パスワード
            <input type="password" name="password" value="<?= echoPost('password'); ?>"></label>
        <input type="submit" value="新規登録">
    </form>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>