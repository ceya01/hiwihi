<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/04/02
 * Time: 19:40
 */

require_once(dirname(__FILE__).'/importCore.php');
dlog('uploadImg: ajax  $_POST:' , $_POST);
dlog('uploadImg: ajax  $_FILES:', $_FILES);
$file_tmp  = $_FILES["img"];
var_dump('$file_tmp:\n ',$file_tmp);
var_dump($_POST);
var_dump($_FILES);