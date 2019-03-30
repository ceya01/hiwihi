<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/22
 * Time: 19:24
 *
 * hiwihi 専用のDBConnector
 * PDOWrapperを保持してDB関連処理を行う
 *
 */

require_once( dirname(__FILE__)."/../../util/PDOWrapper.php" );

/**
 * Class DBConnector
 */
class DBConnector
{

    static protected $pdow;

    /**
     * @return PDOWrapper
     */
    public static function getPdow()
    {
        if(empty(self::$pdow)){
            self::setPdow();
        }
        return self::$pdow;
    }


    public static function setPdow($pdow=null)
    {
        if($pdow == null){
            $dsn = DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8';
            $user = DB_USERNAME;
            $password = DB_PASSWORD;
            $pdow = new PDOWrapper($dsn,$user,$password);
        }
        self::$pdow = $pdow;
    }
}