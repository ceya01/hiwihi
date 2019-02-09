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

function echoLink($pageKey,$linkText){
    echo '<a href="?page='.$pageKey.'">'.$linkText.'</a>';
}