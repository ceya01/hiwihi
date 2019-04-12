<?php
require_once( dirname(__FILE__) . '/include/redirect2login.php' );
require_once( dirname(__FILE__) . '/include/header.php' );
require_once( dirname(__FILE__) . '/core/db/table/TweetTable.php' );
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
                    <?php include(dirname(__FILE__) . '/include/tweetInput.php'); ?>
                    <div class="tweetList">
                    <?php
                        $limit = 10; $offset= 0; //$numTweet= 0;
                        // 表示されてないツイートが残っているかどうか判定するために、
                        // $limit+1として、1つ余分にツイートをDBから取得する。
                        //  実際に表示するのは $limit の数だけ
                        $tweetList = TweetTable::getTweetList($limit+1,$offset);
                        include(dirname(__FILE__) . '/include/tweetList.php');
                    ?>
                    </div>
                    <?php if ($isRemainTweets) { ?>
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