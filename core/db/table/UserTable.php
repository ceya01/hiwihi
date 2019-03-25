<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/23
 * Time: 9:24
 */
require_once ("core/db/record/User.php");
require_once  ("core/db/DBConnector.php");

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

    public function createUser($ary){
        //$user = new User($ary);   //ここでは不要

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

}