<?php   //ログインしてない状態では、トップページに移動
    require_once( dirname(__FILE__) . '/include/redirect2login.php' );
?>
    <!--  ヘッダー -->
<?php
require_once( "include/header.php" );
require_once("core/db/table/UserTable.php");
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
                    <?php if($loginUserID === $userID): ?>
                        <div class="tweetInputWrap">
                            <textarea class="tweetInput" rows="4" maxlength="140" placeholder="いまなにしてる？"></textarea>
                            <button class="btnColor-bghiwihi btnPostTweet">ついーと！</button>
                            <script src="js/postTweet.js"></script>
                        </div>
                    <?php endif; ?>
                    <div class="tweetList">
                        <?php
                        require_once( 'core/db/table/TweetTable.php' );
                        //require_once('core/db/table/UserTable.php');
                        $tweetList = TweetTable::getTweetListOfUser($userID);
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
<?php if($loginUserID === $userID): ?>
    <script src="js/tweetActions.js"></script>
<?php endif; ?>
    <!--  フッター -->
<?php require_once( "include/footer.php" ); ?>