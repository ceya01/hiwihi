<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/09
 * Time: 14:07
 */
?>

<footer>
    <div class="inner footer-inner">
        <div class="InfooterBox footerLeft">
            <img src="img/logo.png" alt="ﾋｳｨｯﾋﾋｰ">
        </div>
        <div class="footerRight">
            <div class="InfooterBox">
                <ul>
                    <li><a href="index.php">トップページ</a></li>
                    <li><a href="timeline.php">タイムライン</a></li>
                    <li><a href="user.php">マイページ</a></li>
                    <li>　</li>
                    <li>　</li>
                </ul>
            </div>
            <div class="InfooterBox">
                <ul>
                    <li><a href="about.php">ﾋｳｨｯﾋﾋｰとは？</a></li>
                    <li><a href="404.php">お問い合わせ</a></li>
                    <li><a href="404.php">github</a></li>
                    <li><a href="404.php">利用規約</a></li>
                    <li><a href="404.php">なんか</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php
//footerの下にデバッグ用リンクを表示する
if (IS_DEBUG) {
    include(dirname(__FILE__).'/footer_debug.php');
}
?>

</body>
</html>
