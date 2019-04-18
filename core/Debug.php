<?php

if (IS_LOGGING) {
    error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
    ini_set('display_errors', 'On');  //画面にエラーを表示させるか

    //================================
    // ログ設定
    //================================
    //ログを取るか
    ini_set('log_errors', 'on');
    //ログの出力ファイルを指定
    ini_set('error_log', dirname(__FILE__).'/../log/'.date('Y-m-d').'.log');
    //error_log(PHP_EOL);
    error_log(PHP_EOL .'◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆デバッグログ出力開始◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆' . PHP_EOL .
        $_SERVER['REQUEST_URI']. PHP_EOL);
    error_log('');
}

//ログ出力
function dlog($str = '',$print=null)
{
    if (!IS_DEBUG && !IS_LOGGING) {
        return;
    }
    if (empty($str)) {
        error_log('ログテキストが空です。');
    } else {
        if(empty($print)){
            error_log($str);
        }else{
            error_log($str.' '.print_r($print,true));
        }
    }
}

//var_dump
function dump($arg)
{
    if (IS_DEBUG) {
        var_dump($arg);
    }
}
