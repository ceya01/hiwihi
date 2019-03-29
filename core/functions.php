<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/09
 * Time: 14:17
 */

//ログインしていればtrue　そうでなければfalseを返す
//
//function isLogin()
//{
//    if (empty($_SESSION)) {
//        return false;
//    }
//    return $_SESSION['login'];
//}

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
    echo '<a href="' . $pageKey . '.php">' . $linkText . '</a>';
    //echo '<a href="?page='.$pageKey.'">'.$linkText.'</a>';
}

//$_POST の中身を出力
function echoPost($key = ''): void
{
    if (!empty($_POST[$key])) {
        echo htmlspecialchars($_POST[$key]);
    }
}

function getPost($key = '')
{
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }
}

function getArrayKey($ary,$key,$default=null){
    return array_key_exists($key,$ary) ? $ary[$key] : $default;
}

function echoErrMsg($msg): void
{
    if (!empty($msg)) {
        echo '<span class="errmsg">' . $msg . '</span>';
    }
}
