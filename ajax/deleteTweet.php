<?php
//ツイート削除のajax処理
require_once( dirname(__FILE__) . '/../include/importCore.php' );
require_once( dirname(__FILE__) . '/../core/db/table/TweetTable.php' );
dlog('ajax deleteTweet  $_POST:',$_POST);
TweetTable::delete($_POST['id']);