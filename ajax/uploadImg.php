<?php

require_once( dirname(__FILE__) . '/importCore.php' );
require_once( dirname(__FILE__) . '/../core/db/table/UserTable.php' );
dlog('uploadImg: ajax  $_FILES:', $_FILES);

if(!isset($_FILES)){
    exit();
}
$imgFile = $_FILES['img'];
if($imgFile['error'] !==0){
    exit($imgFile['error']);
}
//$originaName = $_FILES['img']['name'];
$type = @exif_imagetype($imgFile['tmp_name']);
$hashedName = sha1_file($imgFile['tmp_name']).image_type_to_extension($type);

$destPath = dirname(__FILE__).'/../uploads/'.$hashedName;

move_uploaded_file($imgFile['tmp_name'],$destPath);
UserTable::updateUser(['icon'=>$hashedName],Session::getLoginUserID());