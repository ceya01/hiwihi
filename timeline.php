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

                    <!--ツイート投稿欄-->
                    <div class="tweetInputWrap">
                        <textarea class="tweetInput" rows="4" maxlength="140" placeholder="いまなにしてる？"></textarea>
                        <button class="btnColor-bghiwihi btnPostTweet">ついーと！</button>
                        <script src="js/postTweet.js"></script>
                    </div>

                    <div class="tweetList">
                        <?php
                        require_once( 'core/db/table/TweetTable.php' );
                        //require_once('core/db/table/UserTable.php');
                        $tweetList = TweetTable::getAllTweetList(10);
                        if ($tweetList) {
                            foreach ($tweetList as $tweetRecord) {
                                include( 'include/tweet_box.php' );
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!--  フッター -->
<?php require_once( "include/footer.php" ); ?>