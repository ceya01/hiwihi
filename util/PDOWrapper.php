<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/22
 * Time: 19:11
 *
 * 汎用PDOラッパークラス
 * 他のプロジェクトでも使うことを意識して作る
 */


class PDOWrapper
{

    private $pdo;

    function __construct($dsn,$user,$password,$options=null)
    {
        if(empty($options)){
            $options = array(
                // SQL実行失敗時にはエラーコードのみ設定
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_SILENT,
                // デフォルトフェッチモードを連想配列形式に設定
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
                // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
                \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            );
        }
        $this->pdo = new \PDO($dsn, $user, $password, $options);

    }

    function queryPost($sql, $data){
        //クエリー作成
        $stmt = $this->pdo->prepare($sql);
        //プレースホルダに値をセットし、SQL文を実行
        if(!$stmt->execute($data)){
            dlog('クエリに失敗しました。');
            dlog('失敗したSQL：'.print_r($stmt,true));
            return 0;
        }
        dlog('クエリ成功。');
        return $stmt;
    }

    //引数にテーブル名、['列名'=>値,...] 形式の連想配列を入れてINSERTする
    function insert($tableName,$valueAry){
        $rowName = implode(',',array_keys($valueAry));
        $pps = ':'.implode(',:',array_keys($valueAry));; //prepared-statements

        $sql = 'INSERT INTO '.$tableName.'('.$rowName.') VALUES('.$pps.')';
        $data = array_combine(explode(',',$pps),array_values($valueAry));
        $this->queryPost($sql,$data);


//        foreach ($valueAry as $key => $item) {
//            $rowName =.
//        }


//        $sql = 'INSERT INTO '.$tableName.' (char_id,email,password,name,regist_time,edit_time)
//                VALUES(:char_id,:email,:password,:name,:regist_time,:edit_time)';
//        $data = array(
//            ':char_id' => $ary[KEY_CHARID],
//            ':email' => $ary[KEY_EMAIL],
//            ':password' => password_hash($ary[KEY_PASSWORD], PASSWORD_DEFAULT),
//            ':name' => $ary[KEY_CHARID],
//            ':regist_time' => date('Y-m-d H:i:s'),
//            ':edit_time' => date('Y-m-d H:i:s'));
//
    }


}