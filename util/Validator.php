<?php

class Validator
{
    const ERRMSG_INVALID_EMAIL = 'メールアドレスの形式が正しくありません';
    const ERRMSG_INVALID_USERID = 'ユーザーIDは半角英数字とアンダーバーのみ使用可能です';
    const ERRMSG_INVALID_PASSWORD = 'パスワードは半角英数字のみ使用可能です';

    const ERRMSG_OVER_LENGTH = '文字以内で入力してください';

    const ERRMSG_DUP_EMAIL = 'このメールアドレスはすでに登録されています。';

    const ERRMSG_DB = 'データーベース接続エラー';


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

    //エラーがなければtrueを返す
    public function hasNoError():bool
    {
        return count($this->errorMessages) ==0;
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
            $this->addErrorMessage($maxLength.self::ERRMSG_OVER_LENGTH,$key);
            return self::ERRMSG_OVER_LENGTH;
        }
    }

    public function validEmail($str) :string
    {
        $result = $this->validEmailFormat($str);
        $result .= ','.$this->validEmailDup($str);
        return $result;
    }


    //Email形式チェック
    /**
     * @param $str
     * @return string
     */
    public function validEmailFormat($str) :string
    {
        if(preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $str)){
            return '';
        }else{
            $this->addErrorMessage(self::ERRMSG_INVALID_EMAIL,KEY_EMAIL);
            return self::ERRMSG_INVALID_EMAIL;
        }
    }
    //Email重複チェック
    /**
     * @param $str
     * @return string
     */
    public function validEmailDup($str) :string
    {
        require_once("core/db/table/userTable.php");
        try {
            if(UserTable::existEmail($str)){
                $this->addErrorMessage(self::ERRMSG_DUP_EMAIL,KEY_EMAIL);
                return self::ERRMSG_DUP_EMAIL;
            }else{
                return '';
            }
        } catch (Exception $exception) {
            $this->addErrorMessage(self::ERRMSG_DB,KEY_EMAIL);
        }

    }


    //ユーザーIDチェック 半角英数or _ でなければエラー
    /**
     * @param $str
     * @return string
     */
    public function validUserIDFormat($str) :string
    {
        $this->validLength($str,self::MAXL_USERID,KEY_CHARID);
        if(preg_match('/^[a-zA-Z0-9_]+$/', $str)){
            return '';
        }else{
            $this->addErrorMessage(self::ERRMSG_INVALID_USERID,KEY_CHARID);
            return self::ERRMSG_INVALID_USERID;
        }
    }

    //パスワードチェック 半角英数記号でなければエラー
    /**
     * @param $str
     * @return string
     */
    public function validPasswordFormat($str) :string
    {
        $this->validLength($str,self::MAXL_PASSWORD,KEY_PASSWORD);
        if(preg_match('/^[!-~]+$/', $str)){
            return '';
        }else{
            $this->addErrorMessage(self::ERRMSG_INVALID_PASSWORD,KEY_PASSWORD);
            return self::ERRMSG_INVALID_PASSWORD;
        }
    }


}