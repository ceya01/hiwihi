<?php

//require_once ("core/db/record/User.php");
require_once(dirname(__FILE__)."/../DBConnector.php");

class UserTable
{

    public static function createUser($argary): int
    {
        $ary = array(
            'char_id' => $argary[KEY_CHARID],
            'email' => $argary[KEY_EMAIL],
            'password' => password_hash($argary[KEY_PASSWORD], PASSWORD_DEFAULT),
            'name' => $argary[KEY_CHARID],
            'regist_time' => date('Y-m-d H:i:s'),
            'edit_time' => date('Y-m-d H:i:s')
        );

        $pdow = DBConnector::getPdow();
        $id = $pdow->insert('user',$ary);
        return $id;
        //dlog('$createdUserAry: ',$createdUserAry);
    }
    static public function updateUser($argary,$id){
        $ary = $argary+['edit_time' => date('Y-m-d H:i:s') ];
        $pdow = DBConnector::getPdow();
        $pdow->update('user',$ary,$id);
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
        return self::exist(KEY_EMAIL,$email);
    }

    static public function existCharID($charID):bool{
        return self::exist(KEY_CHARID,$charID);
    }

    static public function getUser($id, $col='*'){
        $sql = 'SELECT '.$col.' FROM user WHERE id=:id AND delete_flag = 0';
        $data = ['id' => $id];
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    static public function getUserPropety($id, $propety,$defaultReturn =''){
        $result = self::getUser($id,$propety);
        return isset($result[$propety]) ? $result[$propety] : $defaultReturn;
    }
    static public function getUserNameByID($id):string{
        return self::getUserPropety($id,KEY_NAME,'(名無し)');
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
    static public function getUserIconByID($id):string{
        $defaultPath = 'img/avatar_default_150x.png';
        $path = self::getUserPropety($id,KEY_ICON,$defaultPath);
        if($path != $defaultPath){
            $path = 'uploads/'.$path;
        }
        return $path;
    }

    static public function getUserByCharID($char_id,$col='*'){
        $sql = 'SELECT '.$col.' FROM user WHERE char_id=:char_id AND delete_flag = 0';
        $data = ['char_id' => $char_id];
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getAllUserList($limit=100,$cols='*')
    {
        $sql = 'SELECT '.$cols.' FROM user WHERE delete_flag = 0 LIMIT '.$limit;
        $pdow = DBConnector::getPdow();
        try {
            $stmt = $pdow->queryPost($sql);
            if(!$stmt){ return null;}
            $result = $stmt->fetchAll();
            return $result;
        } catch (Error $exception) {
            echo 'エラーが発生しました<br>'.$exception;

        }
        return null;
    }

}