<?php
//汎用関数まとめ

//ページが存在するかどうか確かめる
function isPage($pageName)
{
    if (empty($_GET)) {
        // /about　でも aboutページに行けるように　.htaccessとの合わせ技で
        $strAry = explode('/', $_SERVER['REQUEST_URI']);
        if ($strAry[count($strAry) - 1] === $pageName) {
            return true;
        }
        return false;
    }
    //$GETパラメータを使う
    return $_GET['p'] === $pageName;

}

//ヘッダーのリンク出力用関数
function echoHeaderLink($pageKey, $linkText)
{
    echo '<a href="' . sanitize($pageKey) . '.php">' . sanitize($linkText). '</a>';
    //echo '<a href="?page='.$pageKey.'">'.$linkText.'</a>';
}

//$_POST の中身を出力
function echoPost($key = ''): void
{
    if (!empty($_POST[$key])) {
        echo sanitize($_POST[$key]);
    }
}

//$_POST の中身を取得
function getPOST($key = '',$default=null)
{
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }else{
        return $default;
    }
}

//$_GET の中身を取得
function getGET($key = '',$default=null)
{
    if (!empty($_GET[$key])) {
        return $_GET[$key];
    }else{
        return $default;
    }
}

//$_SERVER の中身を取得
function getSERVER($key = '',$default=null)
{
    if (!empty($_SERVER[$key])) {
        return $_SERVER[$key];
    }else{
        return $default;
    }
}

//存在するなら $ary[$key] を返す。 存在しないなら $default を返す
function getArrayKey($ary,$key,$default=null){
    return array_key_exists($key,$ary) ? $ary[$key] : $default;
}

//$msg をサニタイズして出力する
function echoErrMsg($msg): void
{
    if (!empty($msg)) {
        echo '<span class="errmsg">' . sanitize($msg) . '</span>';
    }
}

//サニタイズ関数
function sanitize($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

//現在のページがユーザーページかどうか調べる
function isUserPage(){
    return strpos(getSERVER('PHP_SELF','').getSERVER('HTTP_REFERER',''),'user.php');
}