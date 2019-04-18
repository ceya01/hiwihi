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
                </ul>
            </div>
            <div class="InfooterBox">
                <ul>
                    <li><a href="about.php">ﾋｳｨｯﾋﾋｰとは？</a></li>
                    <li><a href="https://github.com/ceya01/hiwihi" target="_blank">github</a></li>
                    <li><a href="https://ce-ya.net/hiwihi-postscript" target="_blank">制作後記</a></li>
<!--                    <li><a href="404.php">利用規約</a></li>-->
<!--                    <li><a href="404.php">なんか</a></li>-->
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
