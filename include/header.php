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
        <li>ヒウィッヒヒーとは</li>
        <?php if(isLogin()) : ?><li>タイムライン</li>
        <?php else : ?><li>ログイン</li>
        <?php endif; ?>
        <li>マイページ</li>
    </ul>
</header>