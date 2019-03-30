<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/23
 * Time: 9:24
 */
require_once ("core/db/record/User.php");
require_once ("core/db/DBConnector.php");

class UserTable
{
    static private $instance;

    /**
     * @return UserTable
     */
    public static function getInstance()
    {
        if(empty(self::$instance)){
            self::$instance = new UserTable();
        }
        return self::$instance;
    }
    public static function createUser($ary): int
    {
        $ary = array(
            'char_id' => $ary[KEY_CHARID],
            'email' => $ary[KEY_EMAIL],
            'password' => password_hash($ary[KEY_PASSWORD], PASSWORD_DEFAULT),
            'name' => $ary[KEY_CHARID],
            'regist_time' => date('Y-m-d H:i:s'),
            'edit_time' => date('Y-m-d H:i:s')
        );

        $pdow = DBConnector::getPdow();
        $id = $pdow->insert('user',$ary);
        return $id;
        //dlog('$createdUserAry: ',$createdUserAry);
    }

    static private function exist($rowName,$val):bool{
        $sql = 'SELECT count(*) FROM user WHERE '.$rowName.'=:r AND delete_flag = 0';
        $data = ['r' => $val];
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_shift($result) != 0;
    }
    static public function existEmail($email):bool{
        return self::exist('email',$email);
//
    }

    static public function existCharID($charID):bool{
        return self::exist('char_id',$charID);
    }

    static public function getUserByID($id,$row='*'):array{
        $sql = 'SELECT '.$row.' FROM user WHERE id=:id AND delete_flag = 0';
        $data = ['id' => $id];
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    static public function getUserNameByID($id):string{
        $result = self::getUserByID($id,KEY_NAME);
        return array_key_exists(KEY_NAME,$result) ? $result[KEY_NAME] : 'ユーザー名';
    }
    static public function getUserCharIDByID($id):string{
        $result = self::getUserByID($id,KEY_CHARID);
        return array_key_exists(KEY_CHARID,$result) ? $result[KEY_CHARID] : 'userID';
    }
    static public function getUserEmailByID($id):string{
        $result = self::getUserByID($id,KEY_EMAIL);
        return array_key_exists(KEY_EMAIL,$result) ? $result[KEY_EMAIL] : 'mail@mail.com';
    }
}