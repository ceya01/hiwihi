<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/29
 * Time: 10:46
 */
class Auth
{
    static $currentUser;

    /**
     * @return mixed
     */
    public static function getCurrentUser():User
    {
        return self::$currentUser;
    }

    //ログイン
    static public function login($loginID,$password):bool{
        $pdow = DBConnector::getPdow();
 //       $pdow->exist('hiwihi.user','email OR char_id',$loginID,'AND delete_flag = 0');
        $sql = 'SELECT password,id FROM hiwihi.user WHERE (email=:loginID OR char_id=:loginID) AND delete_flag = 0';
        $data = ['loginID'=>$loginID,'password'=>$password];
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        dlog('$result: ',$result);  //$resultにはSELECTがで取得した配列が入る
        if(!empty($result) ){
            $recPassword = $result['password'];
            if(password_verify($password,$recPassword)){
                require_once( dirname(__FILE__)."Session.php" );
                $recUserID = $result['id'];
                Session::addLoginUserID($recUserID);
                return true;
            }
        }
//        return !empty($result) && password_verify($password,array_shift($result));


        return false;

    }
//      ログアウト処理は単純なので未実装
//    static public function logout():void{
//
//    }

    //ログインしていればtrue　そうでなければfalseを返す
    static public function isLogin():bool{
       return  Session::getLoginUserID() != -1;
    }

}