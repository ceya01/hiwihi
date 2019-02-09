<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/09
 * Time: 13:58
 */


function echoIncludeLink($pageKey, $linkText){
    echo '<a href="?p='.$pageKey.'">'.$linkText.'</a>';
    //echo '<a href="?page='.$pageKey.'">'.$linkText.'</a>';
}



//<!--    ヘッダー   ヒウィッヒヒーとは/ [ログイン] / マイページ --
?>

<header>
    <h1>ヒウィッヒヒー</h1>
    <ul>
        <li><?php echoIncludeLink(PAGE_ABOUT,'ヒウィッヒヒーとは'); ?></li>
        <?php if(isLogin()) : ?>
            <li><?php echoIncludeLink(PAGE_TIMELINE,'タイムライン'); ?></li>
        <?php else : ?>
            <li><?php echoIncludeLink(PAGE_LOGIN,'ログイン'); ?></li>
        <?php endif; ?>
        <li><?php echoIncludeLink(PAGE_USER,'マイページ'); ?></li>
        <li><?php echoIncludeLink(PAGE_TWEET,'ツイート'); ?></li>
    </ul>
</header>