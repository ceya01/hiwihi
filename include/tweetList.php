    <?php
 //   global $limit;
//    global $offset;
//    global $numTweet;
//    global $tweetList;
 //   global $isRemainTweets;
    //$limit = getPOST('limit',10);
    //$offset = getPOST('offset',0);
    //$tweetList = TweetTable::getTweetList($limit,$offset);
    dlog('$tweetList',$tweetList);
    $isRemainTweets = true;
    if ($tweetList) {

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
        ?> <p>まだツイートがありません！</p> <?php
    }
    ?>
    <input id="isRemainTweets" type="hidden" value="<?php echo $isRemainTweets ?>">
<!--<div id="numTweet" data-num="--><?php //echo ?><!--"></div>-->
<!--</div>-->
