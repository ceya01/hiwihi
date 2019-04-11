<?php
require_once( dirname(__FILE__) . '/include/redirect2login.php' );
//<!--  ヘッダー -->
// TODO aaa
require_once( "include/header.php" );
?>
    <!--  メイン -->
    <main>
        <div class="inner">
            <div class="timelineWrap">
                <div class="timelineBlock sideArea">
                    <?php include( 'include/user_box.php' ); ?>
                </div>
                <div class="timelineBlock mainArea">
                    <h2 class="mb1rem">全体タイムライン</h2>
                    <!-- //todo: user.phpと被ってるので統合させたい　-->
                    <!--ツイート投稿欄-->
                    <div class="tweetInputWrap">
                        <textarea class="tweetInput" rows="4" maxlength="140" placeholder="いまなにしてる？"></textarea>
                        <button class="btnColor-bghiwihi btnPostTweet">ついーと！</button>
                        <script src="js/postTweet.js"></script>
                    </div>
                    <div class="tweetList">
                    <?php
                        $limit = 10;
                        $offset= 0;
                        $numTweet= 0;
                        include('include/tweetList.php');
                    ?>
                    </div>
                    <?php if ($numTweet === $limit) { ?>
                        <div class="showMoreTweet btn-rr btnColor-bgWhite"
                             data-limit="<?php echo $limit ?>" data-offset="<?php echo $numTweet ?>" >
                            ツイートをさらに表示　∨
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>


    <script src="js/tweetActions.js"></script>
    <script src="js/showMoreTweet.js"></script>
    <!--  フッター -->
<?php require_once( "include/footer.php" ); ?>