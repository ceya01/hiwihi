<?php

require_once(dirname(__FILE__).'/importCore.php');
require_once(dirname(__FILE__).'/../core/db/table/TweetTable.php');
dlog('ajax editTweet  $_POST:',$_POST);
$text = getPOST('text');
$id = getPOST('id');
TweetTable::update($text,$id);