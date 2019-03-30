<?php
//セッションを使う
session_start();
//現在のセッションIDを新しく生成したものと置き換える（なりすましのセキュリティ対策）
session_regenerate_id();
require_once( dirname(__FILE__)."/../core/Debug.php" );
require_once( dirname(__FILE__)."/../core/const.php" );
require_once( dirname(__FILE__)."/../core/db/db-config.php" );
require_once( dirname(__FILE__)."/../core/Session.php" );
require_once( dirname(__FILE__)."/../core/Auth.php" );
require_once( dirname(__FILE__)."/../core/functions.php" );