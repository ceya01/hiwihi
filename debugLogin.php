<?php

//デバッグ専用　GETのID入力だけで強制ログインする
require_once (dirname(__FILE__).'/core/Debug.php');
if(!IS_DEBUG){
    header('Location:index.php');
}

if( !isset($_GET['uid']) ){
    header('Location:index.php');
}
require_once (dirname(__FILE__).'/core/Session.php');
Session::setLoginUserID($_GET['uid']);
header('Location:timeline.php');

