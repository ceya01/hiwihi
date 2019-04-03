<?php

require_once(dirname(__FILE__).'/importCore.php');
require_once(dirname(__FILE__).'/../core/db/table/UserTable.php');
dlog('uploadImg: ajax  $_FILES:', $_FILES);

if(!isset($_FILES)){
    exit();
}
if($_FILES['img']['error'] !==0){
    exit($_FILES['img']['error']);
}

$originaName = $_FILES['img']['name'];
$destPath = dirname(__FILE__).'/../uploads/'.$originaName;

move_uploaded_file($_FILES['img']['tmp_name'],$destPath);
UserTable::updateUser(['icon'=>$originaName],Session::getLoginUserID());