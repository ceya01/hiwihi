<?php
//セッションを使う
session_start();
//現在のセッションIDを新しく生成したものと置き換える（なりすましのセキュリティ対策）
session_regenerate_id();
require_once( "core/Debug.php" );
require_once( "core/const.php" );
require_once( "core/db/db-config.php" );
require_once( "core/Session.php" );
require_once( "core/Auth.php" );
require_once( "core/functions.php" );