<?php
/* ログイン時はタイムラインページに移動　*/
require_once(dirname(__FILE__).'/../core/Session.php');
if(Session::isLogin() ){
    header('Location:timeline.php');
}