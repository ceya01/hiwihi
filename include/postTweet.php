<?php
require_once(dirname(__FILE__).'/importCore.php');
require_once(dirname(__FILE__).'/../core/db/table/TweetTable.php');
dlog('ajax postTweet  $_POST:',$_POST);

TweetTable::create($_POST['tweet'],Session::getLoginUserID());