<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/09
 * Time: 14:07
 */
?>

<footer>
    <div class="inner">
        footer
    </div>
</footer>

<?php
if (IS_DEBUG) :
    //footerの下にデバッグ用リンクを表示する
?>
<div class="debugArea inner mt2rem">Debug Tool!
    <div style="display: flex">
        <div>
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
            echo('$_POST<br>');
            dump($_POST);
            echo('$_SESSION<br>');
            dump($_SESSION);
            ?>
        </div>
        <div>
            <ul>
            <?php require_once(dirname(__FILE__).'/../core/db/table/UserTable.php');
                $userIDs = UserTable::getAllUserList(100,'id');
                foreach ($userIDs as $item)
                {
                    $uid = $item['id'];
                    ?>
                    <li>
                        <a href="debugLogin.php?uid=<?php echo $uid ?>">ID:<?php echo $uid; ?></a> </li>
                    <?php
                }
                //dump($userIDs);



             ?>
            </ul>
        </div>
    </div>

</div>
<?php endif; ?>

</body>
</html>
