<?php
/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/02/09
 * Time: 14:17
 */

//ログインしていればtrue　そうでなければfalseを返す
function isLogin(){
    if(empty($_SESSION)){
        return false;
    }
    return $_SESSION['login'];
}

function isPage($pageName){
    if(empty($_GET)){
        // /about　でも aboutページに行けるように　.htaccessとの合わせ技で
        $strAry = explode('/',$_SERVER['REQUEST_URI']);
        if( $strAry[count($strAry)-1] === $pageName){
            return true;
        }
        return false;
    }
    //$GETパラメータを使う
    return $_GET['p'] === $pageName;

}