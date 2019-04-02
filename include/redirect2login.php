<?php
/* 非ログイン時はログインページに移動　*/
require_once(dirname(__FILE__).'/../core/Session.php');
if(!Session::isLogin() ){
    header('Location:login.php');
}