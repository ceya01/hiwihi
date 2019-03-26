
<?php require_once( "include/importCore.php" ); ?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/ress.css">
    <link rel="stylesheet" href="css/mainStyle.css">
    <link rel="stylesheet" href="css/util.css">
    <title>ﾋｩｲｯﾋﾋｰ</title>
</head>
<body>

<!--    ヘッダー   ヒウィッヒヒーとは/ [ログイン] / マイページ -->
<header>
    <div class="inner">
        <h1>ヒウィッヒヒー</h1>

        <a href="index.php"><img src="img/logo.png" alt="ﾋｩｲｯﾋﾋｰ" class="hiwihi-logo"></a>
        <ul>
            <li><?php echoHeaderLink(PAGE_ABOUT, 'ﾋｩｲｯﾋﾋｰとは'); ?></li>
            <?php if (isLogin()) : ?>
                <li><?php echoHeaderLink(PAGE_TIMELINE, 'タイムライン'); ?></li>
                <li><?php echoHeaderLink(PAGE_USER, 'マイページ'); ?></li>
                <!--        <li>--><?php //echoHeaderLink(PAGE_TWEET,'ツイート'); ?><!--</li>-->
            <?php else : ?>
                <li><?php echoHeaderLink(PAGE_LOGIN, 'ログイン'); ?></li>
                <li><?php echoHeaderLink(PAGE_SIGNUP, '新規登録'); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</header>