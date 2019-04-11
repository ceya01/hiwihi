<!--<div class="tweetList">-->
    <?php
//    global $limit;
//    global $offset;
//    global $numTweet;
    global $tweetList;
    //$limit = getPOST('limit',10);
    //$offset = getPOST('offset',0);
    //$tweetList = TweetTable::getTweetList($limit,$offset);
    dlog('$tweetList',$tweetList);
    if ($tweetList) {
        $numTweet = count($tweetList);
        foreach ($tweetList as $tweetRecord) {
            include( dirname(__FILE__).'/../include/tweet_box.php' );
        }
    } else {
        ?> <p>まだツイートがありません！</p> <?php
    }
    ?>
<!--<div id="numTweet" data-num="--><?php //echo ?><!--"></div>-->
<!--</div>-->
