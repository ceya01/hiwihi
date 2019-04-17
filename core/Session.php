<?php

//セッションを使う処理で読み込む
require_once( dirname(__FILE__) . "/../config.php" );
require_once( dirname(__FILE__)."/../core/Debug.php" );
session_save_path(dirname(__DIR__) . "/session/");
ini_set('session.gc_maxlifetime', Session::LOGIN_DURATION_LONG);
ini_set('session.cookie_lifetime ', Session::LOGIN_DURATION_LONG);
session_start();
session_regenerate_id();


class Session
{
    const LOGIN_USER_ID ='LOGIN_USER_ID';
    const LOGIN_TIMESTAMP ='LOGIN_TIMESTAMP';
    const LOGIN_LIMIT ='LOGIN_LIMIT';
    const LOGIN_DURATION_LONG = 60*60*24*30; //30日間
    const LOGIN_DURATION_SHORT = 60*60; //1時間
    const LOGIN_DURATION_TEST = 10; //10秒

    public static function isLogin():bool{
        dlog('Session.php :: isLogin');
        if(time() > self::getLoginLimit()){
            dlog('ログイン期限切れです');
            return false;
        }
        if(self::getLoginUserID() === -1){
            dlog('ログインIDがありません');
            return false;
        }
        dlog('ログインしています。 ID:'.self::getLoginUserID());
        self::setLoginTimestamp();
        return true;
    }

    
    public static function setLoginUserID($userID):void{
        $_SESSION[self::LOGIN_USER_ID] = (int)$userID;
        self::setLoginTimestamp();
    }
    public static function getLoginUserID():int{
        return array_key_exists(self::LOGIN_USER_ID, $_SESSION) ?
            (int)$_SESSION[self::LOGIN_USER_ID] : -1;
    }


    private static function setLoginTimestamp():void
    {
        $_SESSION[self::LOGIN_TIMESTAMP] = (int)(time());
        self::setLoginLimit();
    }
    private static function getLoginTimestamp():int
    {
        return array_key_exists(self::LOGIN_TIMESTAMP, $_SESSION) ?
            (int)$_SESSION[self::LOGIN_TIMESTAMP] : -1;
    }


    private static function setLoginLimit($limit=self::LOGIN_DURATION_LONG):void
    {
        $_SESSION[self::LOGIN_LIMIT] = (int)(time()+$limit);
    }
    private static function getLoginLimit():int
    {
        return array_key_exists(self::LOGIN_LIMIT, $_SESSION) ?
            (int)$_SESSION[self::LOGIN_LIMIT] : -1;
    }



}