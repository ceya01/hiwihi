<?php


/**
 * Class PDOWrapper
 *
 * PDOオブジェクトのラッパークラス
 *
 */
class PDOWrapper
{

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * PDOWrapper constructor.
     * @param $dsn : DNS名。PDOオブジェクトの第一引数となる
     * @param $user : DBのユーザー名。PDOオブジェクトの第二引数となる
     * @param $password：DBのパスワード。PDOオブジェクトの第三引数となる
     * @param null $options: PDOオブジェクトの第四引数となるオプション。未入力ならデフォルトで設定される
     */
    function __construct($dsn, $user, $password, $options=null)
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

    /**
     * クエリを実行し、PDOStatement オブジェクトを返す
     * @param $sql  : 実行するSQL
     * @param array $data : data配列
     * @return PDOStatement
     * @throws Exception
     */
    function queryPost($sql, $data=[]){
        //クエリー作成
        $stmt = $this->pdo->prepare($sql);
        //プレースホルダに値をセットし、SQL文を実行
        if(!$stmt->execute($data)){
            throw new Exception(
                ' クエリに失敗しました：<br>'.$stmt->errorCode().print_r($stmt->errorInfo(),true).
                ' 失敗したSQL：'.print_r($stmt,true).
                ' data：'.print_r($data,true)
            );
        }
        return $stmt;
    }

    /**
     * クエリを実行し、fetchALlを実行し、結果を返す
     * @param $sql
     * @param array $data
     * @return array|null
     */
    function fetchAll($sql, $data=[]){
        $stmt = $this->queryPost($sql,$data);
        if(!$stmt){ return null;}
        $result = $stmt->fetchAll();
        return $result;
    }
    /**
     * 引数にテーブル名、['列名'=>値,...] 形式の連想配列を入れてINSERT クエリを実行する
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

    /**
     * 引数にテーブル名、['列名'=>値,...] 形式の連想配列を入れてUPDATEクエリを実行する
     * @param $tableName
     * @param $valueAry
     * @param $id
     * @return string
     */
    function update($tableName, $valueAry, $id){
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

    //これ使うくらいならSQL書いてqueryPost使うべきなので使わない

//    function exist($tableName, $rowName='*', $str='', $appendSql=''){
//        $sql = 'SELECT count(*) FROM '.$tableName. ' WHERE '.$rowName .'=:'.$rowName.$appendSql;
//        $data = [$tableName => $str];
//        $stmt = $this->queryPost($sql,$data);
//        $result = $stmt->fetch(PDO::FETCH_ASSOC);
//        return array_shift($result) != 0;
//    }

}