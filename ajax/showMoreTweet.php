<?php
require_once( dirname(__FILE__).'/../include/importCore.php' );
require_once( dirname(__FILE__).'/../core/db/table/TweetTable.php');
$limit = getPOST('limit',10);
$offset = getPOST('offset',0);
$userID = getPOST('userID',-1);
if(isUserPage()){
    $tweetList = TweetTable::getTweetListOfUser($userID,$limit,$offset);
}else{
    $tweetList = TweetTable::getTweetList($limit,$offset);
}
include(dirname(__FILE__).'/../include/tweetList.php');
