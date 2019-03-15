<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/08
 * Time: 10:51
 */

require_once( "core/Debug.php" );
require_once( "core/pageNames.php" );
require_once( "core/functions.php" );

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/mainStyle.css">
    <title>ヒウィッヒヒー</title>
</head>
<body>

<!--    ヘッダー   ヒウィッヒヒーとは/ [ログイン] / マイページ -->
<header>
    <h1>ヒウィッヒヒー</h1>
    <ul>
        <li><?php echoHeaderLink(PAGE_ABOUT, 'ヒウィッヒヒーとは'); ?></li>
        <?php if (isLogin()) : ?>
            <li><?php echoHeaderLink(PAGE_TIMELINE, 'タイムライン'); ?></li>
            <li><?php echoHeaderLink(PAGE_USER, 'マイページ'); ?></li>
            <!--        <li>--><?php //echoHeaderLink(PAGE_TWEET,'ツイート'); ?><!--</li>-->
        <?php else : ?>
            <li><?php echoHeaderLink(PAGE_LOGIN, 'ログイン'); ?></li>
            <li><?php echoHeaderLink(PAGE_NEW, '新規登録'); ?></li>
        <?php endif; ?>
    </ul>
</header>