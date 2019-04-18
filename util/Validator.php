<?php

// TODO :DBアクセス必要な部分は子クラスに移行すべき
// エラーメッセージ表示はValidatorの仕事ではない

class Validator
{
    const ERRMSG_INVALID_EMAIL = 'メールアドレスの形式が正しくありません';
    const ERRMSG_INVALID_USERID = 'ユーザーIDは半角英数字とアンダーバーのみ使用可能です';
    const ERRMSG_INVALID_PASSWORD = 'パスワードは半角英数記号のみ使用可能です';

    const ERRMSG_TOOLONG_LENGTH = '文字以内で入力してください';
    const ERRMSG_TOOSHORT_LENGTH = '文字以上で入力してください';

    const ERRMSG_DUP_EMAIL = 'このメールアドレスはすでに登録されています。';
    const ERRMSG_DUP_CHARID = 'このユーザーIDはすでに使用されています。';

    const ERRMSG_DB = 'データーベース接続エラー';

    const MAXL_USERID = 20;
    const MINL_PASSWORD = 6;
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

    /**
     * 長さチェック
     * @param $str
     * @param $maxLength
     * @param $key
     * @return string
     */
    public function validLength($str,$key,$maxLength,$minLength=1) :string
    {
        if($minLength<=strlen($str) && strlen($str)<=$maxLength){
            return '';
        }else if(strlen($str)>$maxLength){
            $this->addErrorMessage($maxLength.self::ERRMSG_TOOLONG_LENGTH,$key);
            return self::ERRMSG_TOOLONG_LENGTH;
        }else{
            $this->addErrorMessage($minLength.self::ERRMSG_TOOSHORT_LENGTH,$key);
            return self::ERRMSG_TOOSHORT_LENGTH;
        }
    }

    /**
     * Email形式チェック
     * @param $str
     * @param $maxLength
     * @param $key
     * @return string
     */
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
    private function validEmailFormat($str) :string
    {
        if(preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $str)){
            return '';
        }else{
            $this->addErrorMessage(self::ERRMSG_INVALID_EMAIL,KEY_EMAIL);
            return self::ERRMSG_INVALID_EMAIL;
        }
    }

    //todo 重複チェックはDB操作が必要で、現状UserTableクラスに依存しているので、別のクラスに移動するか、改良すべき
    //Email重複チェック
    /**
     * @param $str
     * @return string
     */
    private function validEmailDup($str) :string
    {
        require_once(dirname(__DIR__)."/../core/db/table/UserTable.php");
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
    public function validUserID($str) :string
    {
        $result = $this->validUserIDFormat($str);
        $result .= ','.$this->validUserIDDup($str);
        return $result;
    }

    private function validUserIDFormat($str) :string
    {
        $this->validLength($str,KEY_CHARID,self::MAXL_USERID);
        if(preg_match('/^[a-zA-Z0-9_]+$/', $str)){
            return '';
        }else{
            $this->addErrorMessage(self::ERRMSG_INVALID_USERID,KEY_CHARID);
            return self::ERRMSG_INVALID_USERID;
        }
    }

    private function validUserIDDup($str) :string
    {
        require_once(dirname(__FILE__)."/../core/db/table/UserTable.php");
        try {
            if(UserTable::existCharID($str)){
                $this->addErrorMessage(self::ERRMSG_DUP_CHARID,KEY_CHARID);
                return self::ERRMSG_DUP_CHARID;
            }else{
                return '';
            }
        } catch (Exception $exception) {
            $this->addErrorMessage(self::ERRMSG_DB,KEY_CHARID);
        }
    }

    //パスワードチェック 半角英数記号でなければエラー
    /**
     * @param $str
     * @return string
     */
    public function validPasswordFormat($str) :string
    {
        $this->validLength($str,KEY_PASSWORD, self::MAXL_PASSWORD, self::MINL_PASSWORD);
        if(preg_match('/^[!-~]+$/', $str)){
            return '';
        }else{
            $this->addErrorMessage(self::ERRMSG_INVALID_PASSWORD,KEY_PASSWORD);
            return self::ERRMSG_INVALID_PASSWORD;
        }
    }


}