<?php

class Validator
{
    const ERRMSG_INVALID_EMAIL = 'メールアドレスの形式が正しくありません';
    const ERRMSG_INVALID_USERID = 'ユーザーIDは半角英数字とアンダーバーのみ使用可能です';
    const ERRMSG_INVALID_PASSWORD = 'パスワードは半角英数字のみ使用可能です';
    const ERRMSG_OVER_LENGTH = '文字以内で入力してください';

    const MAXL_USERID = 20;
    const MAXL_PASSWORD = 20;

    private $errorMessages = [];

    /**
     * @return array
     */
    public function getErrorMessages(): array
    {
        return $this->errorMessages;
    }

    /**
     * @param $key
     * @return string
     */
    public function getErrorMessageByKey($key): string
    {
        return array_key_exists($key, $this->errorMessages) ? $this->errorMessages[$key] : '';
    }

    private function addErrorMessage($msg,$key) :void
    {
        if(array_key_exists($key, $this->errorMessages)){
            $this->errorMessages[$key].='<br>'.$msg;
        }else{
            $this->errorMessages[$key] = $msg;
        }
    }

    //Email形式チェック
    /**
     * @param $str
     * @param $maxLength
     * @param $key
     * @return string
     */
    public function validLength($str,$maxLength,$key) :string
    {
        if(strlen($str)<=$maxLength){
            return '';
        }else{
            $this->addErrorMessage($maxLength.Validator::ERRMSG_OVER_LENGTH,$key);
            return Validator::ERRMSG_OVER_LENGTH;
        }
    }


    //Email形式チェック
    /**
     * @param $str
     * @return string
     */
    public function validEmailFormat($str) :string
    {
        if(preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}${,255}/iD', $str)){
            return '';
        }else{
            $this->addErrorMessage(Validator::ERRMSG_INVALID_EMAIL,KEY_EMAIL);
            return Validator::ERRMSG_INVALID_EMAIL;
        }
    }

    //ユーザーIDチェック 半角英数or _ でなければエラー
    /**
     * @param $str
     * @return string
     */
    public function validUserIDFormat($str) :string
    {
        $this->validLength($str,Validator::MAXL_USERID,KEY_USERID);
        if(preg_match('/^[a-zA-Z0-9_]+$/', $str)){
            return '';
        }else{
            $this->addErrorMessage(Validator::ERRMSG_INVALID_USERID,KEY_USERID);
            return Validator::ERRMSG_INVALID_USERID;
        }
    }

    //パスワードチェック 半角英数記号でなければエラー
    /**
     * @param $str
     * @return string
     */
    public function validPasswordFormat($str) :string
    {
        $this->validLength($str,Validator::MAXL_PASSWORD,KEY_PASSWORD);
        if(preg_match('/^[!-~]+$/', $str)){
            return '';
        }else{
            $this->addErrorMessage(Validator::ERRMSG_INVALID_PASSWORD,KEY_PASSWORD);
            return Validator::ERRMSG_INVALID_PASSWORD;
        }
    }
}