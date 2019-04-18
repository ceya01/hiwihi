<?php
    //プロフィール編集処理ajax
    require_once( dirname(__FILE__) . '/../include/importCore.php' );
    require_once( dirname(__FILE__) . '/../core/db/table/UserTable.php' );
    dlog('ajax profileEdit  $_POST:',$_POST);
    UserTable::updateUser([
            'name'=>$_POST['userName'],
            'bio'=>$_POST['userBio'] ],
            Session::getLoginUserID()
    );
