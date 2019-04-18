<?php
//ゲストログイン処理　ID 1～3 はゲストとして登録しておく
if( !isset($_GET['g']) ){
    header('Location:index.php');
    die();
}

$guestID = (int)$_GET['g'];
if($guestID<=0 || $guestID>=4){
    header('Location:index.php');
    die();
}

require_once (dirname(__FILE__).'/core/Session.php');
Session::setLoginUserID($guestID);
header('Location:timeline.php');