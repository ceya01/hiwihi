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
    public static function createUser($ary)
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
        $pdow->insert('user',$ary);
    }
//
//    public function createUser($ary){
//        //$user = new User($ary);   //ここでは不要
//
//        $ary = array(
//            'char_id' => $ary[KEY_CHARID],
//            'email' => $ary[KEY_EMAIL],
//            'password' => password_hash($ary[KEY_PASSWORD], PASSWORD_DEFAULT),
//            'name' => $ary[KEY_CHARID],
//            'regist_time' => date('Y-m-d H:i:s'),
//            'edit_time' => date('Y-m-d H:i:s')
//        );
//
//        $pdow = DBConnector::getPdow();
//        $pdow->insert('user',$ary);
//    }


    static public function existEmail($email){
        $sql = 'SELECT count(*) FROM hiwihi.user WHERE email=:email AND delete_flag = 0';
        $data = array('email' => $email);
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_shift($result) != 0;
    }

}