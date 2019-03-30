<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>
<?php
    require_once("core/db/table/UserTable.php");
    $loginID = Session::getLoginUserID();
?>
<!--  メイン -->
<main>
    <div class="inner">
        <div class="timelineWrap">
            <div class="timelineBlock sideArea">
                <div class="userBox">
                    <img class="avater" src="img/avater_default_150x.png" alt="アバター画像">
                    <div class="userName"><?php echo UserTable::getUserNameByID($loginID); ?></div>
                    <div class="userId">@<?php echo UserTable::getUserCharIDByID($loginID); ?></div>
                    <div class="userStatsWrap">
                        <div class="statsBlock">
                            <div class="statsHead">ついーと</div>
                            <div class="statsValue">12345</div>
                        </div>
                        <div class="statsBlock">
                            <div class="statsHead">ふぉろう</div>
                            <div class="statsValue">12345</div>
                        </div>
                        <div class="statsBlock">
                            <div class="statsHead">ふぉろわ</div>
                            <div class="statsValue">12345</div>
                        </div>
                        <div class="statsBlock">
                            <div class="statsHead">ふぁぼり</div>
                            <div class="statsValue">12345</div>
                        </div>
                    </div>
                </div>
<!--                -->
<!--                <div class="sideInner">-->
<!--                    おすすめコンテンツ…-->
<!--                </div>-->
<!--                -->
            </div>
            <div class="timelineBlock mainArea">
                <h2>タイムライン</h2>
                <div class="tweetBox">
                    <div class="iconWrap"><img src="img/avater_default_50x.png" alt="アイコン"></div>
                    <div class="tweetContent">
                        <div class="tweetBody">ツイート本文７８９０１２３４５６７８９０ツイート本文３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９
                        </div>
                        <div class="tweetFooter leftBubble">
                            <span class="fll">ユーザー名 @user_id 2019/12/34</span>
                            <span class="flr iconWrap">
                                <i class="fas fa-at">1234</i>
                                <i class="fas fa-retweet">5678</i>
                                <i class="fas fa-star">9012</i>
                                <i class="fas fa-ellipsis-h"></i></span>
                        </div>
                    </div>
                </div>

                <div class="tweetBox reverse">
                    <div class="iconWrap"><img src="img/avater_default_50x.png" alt="アイコン"></div>
                    <div class="tweetContent">
                        <div class="tweetBody">ツイート本文７８９０１２３４５６７８９０ツイート本文３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９０１２３４５６７８９０ツイート本文７８９
                        </div>
                        <div class="tweetFooter">
                            <span class="fll">ユーザー名 @user_id 2019/12/34</span>
                            <span class="flr iconWrap">
                                <i class="fas fa-at">1234</i>
                                <i class="fas fa-retweet">5678</i>
                                <i class="fas fa-star">9012</i>
                                <i class="fas fa-ellipsis-h"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!--  フッター -->
<?php require_once( "include/footer.php" ); ?>