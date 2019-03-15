<?php

const IS_DEBUG = true;      // デバッグモードかどうか
const IS_LOGGING = false;    // ログ出力するかどうか

if (IS_DEBUG) {
    error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
    ini_set('display_errors', 'On');  //画面にエラーを表示させるか

    //================================
    // ログ設定
    //================================
    //ログを取るか
    ini_set('log_errors', 'on');
    //ログの出力ファイルを指定
    ini_set('error_log', 'php.log');
    //error_log(PHP_EOL);
    error_log(PHP_EOL . PHP_EOL . PHP_EOL . '◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆デバッグログ出力開始◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆' . PHP_EOL . PHP_EOL);
    error_log('');
}

//ログ出力
function dlog($str = '')
{
    if (!IS_DEBUG || !IS_LOGGING) {
        return;
    }
    if (empty($str)) {
        error_log('ログテキストが空です。');
    } else {
        error_log($str);
    }
}

//var_dump
function dump($arg)
{
    if (IS_DEBUG) {
        var_dump($arg);
    }
}

//
//class Debug
//{
//
//}