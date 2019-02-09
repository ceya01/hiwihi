<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/08
 * Time: 10:51
 */
error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
ini_set('display_errors', 'On');  //画面にエラーを表示させるか

require_once( "core/functions.php" );

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ヒウィッヒヒー</title>
</head>
<body>

<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>

<!--  メイン -->
<?php
    if(isLogin()){
        //<!--　ログインしている場合：　タイムラインを表示　-->
        require_once( "include/timeline.php" );
    }else{
        //<!--　ログインしてない場合：　ログイン画面を表示　-->
        require_once( "include/login.php" );
    }
 ?>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>

</body>
</html>
