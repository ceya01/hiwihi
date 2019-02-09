<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/09
 * Time: 13:58
 */

//<!--    ヘッダー   ヒウィッヒヒーとは/ [ログイン] / マイページ -->

?>

<header>
    <h1>ヒウィッヒヒー</h1>
    <ul>
        <li><?php echoLink(PAGE_ABOUT,'ヒウィッヒヒーとは'); ?></li>
        <?php if(isLogin()) : ?><li><?php echoLink(PAGE_TIMELINE,'タイムライン'); ?></li>
        <?php else : ?><li><?php echoLink(PAGE_LOGIN,'ログイン'); ?></li>
        <?php endif; ?>
        <li><?php echoLink(PAGE_USER,'マイページ'); ?></li>
    </ul>
</header>