    <?php
    // ツイートリストを表示するモジュール
    dlog('$tweetList',$tweetList);
    $isRemainTweets = true; //まだ表示されてないツイートが残っているかどうかのフラグ
    if (!empty($tweetList)) {
        if(count($tweetList) <= $limit){
            $isRemainTweets = false;
        }
        $numTweet = 0;
        foreach ($tweetList as $tweetRecord) {
            include( dirname(__FILE__).'/../include/tweet_box.php' );
            $numTweet++;
            if($numTweet>=$limit) break;
        }
    } else {
        $isRemainTweets = false;
        ?> <p>ツイートがありません！</p> <?php
    }
    ?>
    <?php if(basename($_SERVER['PHP_SELF'])==='showMoreTweet.php'): ?>
        <input id="isRemainTweets" type="hidden" value="<?php echo $isRemainTweets ?>">
    <?php endif;?>
