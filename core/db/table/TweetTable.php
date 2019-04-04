<?php

require_once(dirname(__FILE__)."/../DBConnector.php");
class TweetTable
{
    public static function create($text,$userID,$replyto=null) :int
    {
        $dataAry = [
            'text' => $text,
            'user_id' => $userID,
            'post_time' => date('Y-m-d H:i:s'),
            'edit_time' => date('Y-m-d H:i:s')
        ];
        if(isset($replyto)){
            $dataAry['reply_to'] = $replyto;
        }

        $pdow = DBConnector::getPdow();
        $id = $pdow->insert('tweet',$dataAry);
        return $id;
    }

    public static function update($text,$id)
    {
        $ary = [
            'text' => $text,
            'edit_time' => date('Y-m-d H:i:s')
        ];
        $pdow = DBConnector::getPdow();
        $pdow->update('tweet',$ary,$id);
    }

    public static function delete($id)
    {
        $ary = [
            'delete_flag' => 1
        ];
        $pdow = DBConnector::getPdow();
        $pdow->update('tweet',$ary,$id);
    }

    //TODO: UserTableとほぼ重複してるので解消したい
    //
    public static function getTweet($id,$cols='*')
    {
        $sql = 'SELECT '.$cols.' FROM tweet WHERE id=:id AND delete_flag = 0';
        $data = ['id' => $id];
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getTweetPropety($id, $propety,$defaultReturn ='')
    {
        $result = self::getTweet($id,$propety);
        return isset($result[$propety]) ? $result[$propety] : $defaultReturn;
    }
    public static function getTweetText($id):string
    {
        return self::getTweetPropety($id,'text');
    }
    public static function getTweetUserID($id):string
    {
        return self::getTweetPropety($id,'user_id');
    }

    public static function getTweetWithUser($id)
    {
        $cols = 'tweet.id, tweet.text, tweet.replyto_id, tweet.post_time, tweet.edit_time, user.name, user.char_id, user.icon';
        $sql = 'SELECT '.$cols.' FROM tweet JOIN user ON user.id = tweet.user_id WHERE tweet.id=:id AND tweet.delete_flag = 0';
        $data = ['id' => $id];
        $pdow = DBConnector::getPdow();
        $stmt = $pdow->queryPost($sql,$data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getAllTweetList($limit=100)
    {
        $cols = 'tweet.id, tweet.text, tweet.replyto_id, tweet.post_time, tweet.edit_time, user.name, user.char_id, user.icon';
        $sql = 'SELECT '.$cols.' FROM tweet JOIN user ON user.id = tweet.user_id '.
                'WHERE tweet.delete_flag = 0 ORDER BY tweet.post_time DESC LIMIT '.$limit;

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