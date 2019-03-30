<!--  ヘッダー -->
<?php require_once( "include/header.php" ); ?>

<!--  メイン -->
<main>
    <div class="inner">
        <div class="timelineWrap">
            <div class="timelineBlock sideArea">
                <?php include('include/user_box.php'); ?>
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