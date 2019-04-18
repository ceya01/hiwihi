<?php
//ツイート投稿ajax
require_once( dirname(__FILE__) . '/../include/importCore.php' );
require_once( dirname(__FILE__) . '/../core/db/table/TweetTable.php' );
dlog('ajax postTweet  $_POST:',$_POST);

$idNewTweet = TweetTable::create($_POST['tweet'],Session::getLoginUserID());
$tweetRecord =  TweetTable::getTweetWithUser($idNewTweet);
include( dirname(__FILE__) . '/../include/tweet_box.php' );