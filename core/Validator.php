<?php

class Validator
{
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
        if(array_key_exists ($key,$this->errorMessages)){
            return $this->errorMessages[$key];
        }else{
            return '';
        }
    }






}