<?php
    require_once(dirname(__FILE__).'/importCore.php');
    require_once(dirname(__FILE__).'/../core/db/table/UserTable.php');
    dlog('ajax  $_POST:',$_POST);
//    dlog('ajax  $_FILES:',$_FILES);
    var_dump($_POST);
    var_dump($_FILES);
    UserTable::updateUser(['name'=>$_POST['userName'],'bio'=>$_POST['userBio']],    Session::getLoginUserID());

?>