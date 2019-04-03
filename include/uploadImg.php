<?php


require_once(dirname(__FILE__).'/importCore.php');
require_once(dirname(__FILE__).'/../core/db/table/UserTable.php');
dlog('uploadImg: ajax  $_FILES:', $_FILES);
$originaName = $_FILES['img']['name'];
$destPath = dirname(__FILE__).'/../uploads/'.$originaName;

move_uploaded_file($_FILES['img']['tmp_name'],$destPath);
UserTable::updateUser(['icon'=>$originaName],Session::getLoginUserID());