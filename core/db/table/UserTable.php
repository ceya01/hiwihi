<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/23
 * Time: 9:24
 */
//require_once ("core/db/record/User.php");
require_once(dirname(__FILE__)."/../DBConnector.php");

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

    static public function getUser($id,$row='*'):array{
        $sql = 'SELECT '.$row.' FROM user WHERE id=:id AND delete_flag = 0';
        $data = ['id' => $id];
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    static private function getUserPropety($id, $propety){
        $result = self::getUser($id,$propety);
        //dlog('getUserPropety: ',$result);
        return isset($result[$propety]) ? $result[$propety] : '';
    }
    static public function getUserNameByID($id):string{
        return self::getUserPropety($id,KEY_NAME);
    }
    static public function getUserCharIDByID($id):string{
        return self::getUserPropety($id,KEY_CHARID);
    }
    static public function getUserEmailByID($id):string{
        return self::getUserPropety($id,KEY_EMAIL);
    }
    static public function getUserBioByID($id):string{
        return self::getUserPropety($id,KEY_BIO);
    }
}