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

    function queryPost($sql, $data=[]){
        //クエリー作成
        $stmt = $this->pdo->prepare($sql);
        //プレースホルダに値をセットし、SQL文を実行
        if(!$stmt->execute($data)){
            //dlog('クエリに失敗しました。');
            //dlog('失敗したSQL：'.print_r($stmt,true));
            return null;
        }
        //dlog('クエリ成功。');
        return $stmt;
    }

    /**
     * 引数にテーブル名、['列名'=>値,...] 形式の連想配列を入れてINSERTする
     * @param string $tableName
     * @param array $valueAry
     */
    function insert($tableName, $valueAry){
        $rowName = implode(',',array_keys($valueAry));
        $pps = ':'.implode(',:',array_keys($valueAry));; //prepared-statements

        $sql = 'INSERT INTO '.$tableName.'('.$rowName.') VALUES('.$pps.')';
        $data = array_combine(explode(',',$pps),array_values($valueAry));
        $this->queryPost($sql,$data);
        return $this->pdo->lastInsertId();
    }

    function update($tableName, $valueAry,$id){
        $rowName = implode(',',array_keys($valueAry));
        $pps = ':'.implode(',:',array_keys($valueAry));; //prepared-statements
        $setStr = '';
        foreach ($valueAry as $key => $item) {
            $setStr .= $key.' = :'.$key.',';
        }
        $setStr = substr($setStr,0,-1);

        $sql = 'UPDATE '.$tableName.' SET '.$setStr.' WHERE id =:id';
        $data = array_combine(explode(',',$pps),array_values($valueAry))+[':id'=>$id];
        $this->queryPost($sql,$data);
        return $this->pdo->lastInsertId();
    }

    /**
     * 引数の　テーブル名、列名、に 文字列が存在するか調べる
     * @param string $tableName
     * @param string $rowname
     * @param string $str
     * @param string $appendSql
     */

    //これ使うくらいならSQL書いた方が良さそうなので使わない

//    function exist($tableName, $rowName='*', $str='', $appendSql=''){
//        $sql = 'SELECT count(*) FROM '.$tableName. ' WHERE '.$rowName .'=:'.$rowName.$appendSql;
//        $data = [$tableName => $str];
//        $stmt = $this->queryPost($sql,$data);
//        $result = $stmt->fetch(PDO::FETCH_ASSOC);
//        return array_shift($result) != 0;
//    }

}