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
                    <!-- //todo: user.phpと被るので統合させたい　-->
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
                        $numToGetTweet = 10;
                        $numTweet = 0;
                        $tweetList = TweetTable::getAllTweetList($numToGetTweet);
                        if ($tweetList) {
                            $numTweet = count($tweetList);
                            foreach ($tweetList as $tweetRecord) {
                                include( 'include/tweet_box.php' );
                            }
                        } else {
                            ?> <p>まだツイートがありません！</p> <?php
                        }
                        ?>
                    </div>
                    <?php if ($numTweet === $numToGetTweet) { ?>
                        <div class="showMoreTweet btn-rr btnColor-bgWhite">ツイートをさらに表示　∨</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>


    <script src="js/tweetActions.js"></script>
    <script src="js/showMoreTweet.js"></script>
    <!--  フッター -->
<?php require_once( "include/footer.php" ); ?>