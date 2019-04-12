<?php   //ログインしてない状態では、トップページに移動
    require_once( dirname(__FILE__) . '/include/redirect2login.php' );
?>
    <!--  ヘッダー -->
<?php
require_once( "include/header.php" );
require_once("core/db/table/UserTable.php");
require_once( dirname(__FILE__).'/core/db/table/TweetTable.php' );
    $userCharID = getGET('u');
    $loginUserID = Session::getLoginUserID();
    if($userCharID === null){
        $userID = (int)$loginUserID;
        $userName = UserTable::getUserNameByID($userID);
    }else{
        $userRecord = UserTable::getUserByCharID($userCharID,'id,name');
        $userID = (int)$userRecord['id'];
        $userName = $userRecord['name'];
    }
?>

    <!--  メイン -->
    <main>
        <div class="inner">
            <div class="timelineWrap">
                <div class="timelineBlock sideArea">
                    <?php include( "include/user_box.php" ); ?>
                </div>
                <div class="timelineBlock mainArea">
                    <h2 class="mb1rem"><?php echo $userName ?>のツイート一覧</h2>

                    <!--ツイート投稿欄-->
                    <?php if($loginUserID === $userID) {
                        include( dirname(__FILE__) . '/include/tweetInput.php' );
                    }?>
                    <div class="tweetList">
                        <?php
                            $limit = 10; $offset= 0; $numTweet= 0;
                            $tweetList = TweetTable::getTweetListOfUser($userID,$limit+1,$offset);
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
<script src="js/showMoreTweet.js"></script>
<?php if($loginUserID === $userID): ?>
    <script src="js/tweetActions.js"></script>
<?php endif; ?>
    <!--  フッター -->
<?php require_once( "include/footer.php" ); ?>