<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/09
 * Time: 14:07
 */
?>

<footer>
    footer
</footer>

<?php
if (IS_DEBUG) :
    echo 'Debug mode!';
?>
    <ul>
        <li><?php echoHeaderLink(PAGE_ABOUT, 'ヒウィッヒヒーとは'); ?></li>
        <li><?php echoHeaderLink(PAGE_TIMELINE, 'タイムライン'); ?></li>
        <li><?php echoHeaderLink(PAGE_USER, 'ユーザーページ'); ?></li>
        <li><?php echoHeaderLink(PAGE_TWEET, 'ツイート'); ?></li>
        <li><?php echoHeaderLink(PAGE_LOGIN, 'ログイン'); ?></li>
        <li><?php echoHeaderLink(PAGE_SIGNUP, '新規登録'); ?></li>
        <li><?php echoHeaderLink(PAGE_PASS_REMINDER, 'パスワードリマインダー'); ?></li>
    </ul>
    <?php
    dump($_POST);
    dump($_SESSION);
    ?>
<?php endif; ?>

</body>
</html>
