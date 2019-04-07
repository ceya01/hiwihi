<?php

//セッションを使う処理で読み込む

//セッションを使う
session_start();
//現在のセッションIDを新しく生成したものと置き換える（なりすましのセキュリティ対策）
session_regenerate_id();

class Session
{
    const LOGIN_USER_ID ='LOGIN_USER_ID';

    static public function setLoginUserID($userID){
        $_SESSION[self::LOGIN_USER_ID] = (int)$userID;
    }
    static public function getLoginUserID():int{
        return array_key_exists(self::LOGIN_USER_ID, $_SESSION) ? $_SESSION[self::LOGIN_USER_ID] : -1;
    }
    static public function isLogin():bool{
        return  self::getLoginUserID() != -1;
    }

}