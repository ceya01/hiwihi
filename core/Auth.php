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

 //     $pdow->exist('hiwihi.user','email OR char_id',$loginID,'AND delete_flag = 0');
        try {
            $sql = 'SELECT password,id FROM user WHERE (email=:loginID OR char_id=:loginID) AND delete_flag = 0';
            $data = ['loginID' => $loginID, 'password' => $password];

            $pdow = DBConnector::getPdow();
            $stmt = $pdow->queryPost($sql, $data);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //        dlog('Auth::login ',[$loginID,$password,$sql,$data] );
            dlog('Auth::login $result: ', $result);  //$resultにはSELECTがで取得した配列が入る
            if (!empty($result)) {
                $recPassword = $result['password'];
                if (password_verify($password, $recPassword)) {
                    //require_once( dirname(__FILE__)."Session.php" );
                    $recUserID = $result['id'];
                    Session::setLoginUserID($recUserID);
                    return true;
                }
            }
        }
        catch (Exception $exception) {
            dlog('Error at Auth::login():',$exception);
        }
        return false;


    }

//      ログアウト処理はセッションデストロイするだけで単純なので未実装
//    static public function logout():void{
//
//    }

    //Sessionへのエイリアス →　無効化
    //ログインしていればtrue　そうでなければfalseを返す
//
//    static public function isLogin():bool{
//       return  Session::isLogin();
//    }
//    static public function getLoginUserID():int{
//        return  Session::getLoginUserID();
//    }
//
}