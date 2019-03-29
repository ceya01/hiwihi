<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/29
 * Time: 11:26
 */



class Session
{
    const LOGIN_USER_ID ='LOGIN_USER_ID';

    static public function addLoginUserID($userID){
        $_SESSION[self::LOGIN_USER_ID] = (int)$userID;
    }
    static public function getLoginUserID():int{
        return array_key_exists(self::LOGIN_USER_ID, $_SESSION) ? $_SESSION[self::LOGIN_USER_ID] : -1;
    }

}