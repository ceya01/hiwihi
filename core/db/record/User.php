<?php

/**
 * Created by PhpStorm.
 * User: eceys
 * Date: 2019/03/23
 * Time: 9:32
 */
class User
{
    private $id;
    private $char_id;
    private $name;
    private $email;
    private $password;
    private $regist_time;
    private $edit_time;

    /**
     * User constructor.
     * @param $id
     * @param $char_id
     * @param $name
     * @param $email
     * @param $password
     * @param $regist_time
     * @param $edit_time
     */
    public function __construct($arg)
    {
        $this->id = getArrayKey($arg,'id');
        $this->char_id = getArrayKey($arg,'char_id');
        $this->name = getArrayKey($arg,'name');
        $this->email = getArrayKey($arg,'email');
        $this->password = getArrayKey($arg,'password');
        $this->regist_time = getArrayKey($arg,'regist_time');
        $this->edit_time =getArrayKey($arg,'edit_time');
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
//    public function setId($id)
//    {
//        $this->id = $id;
//    }

    /**
     * @return mixed
     */
    public function getCharId()
    {
        return $this->char_id;
    }

    /**
     * @param mixed $char_id
     */
    public function setCharId($char_id)
    {
        $this->char_id = $char_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRegistTime()
    {
        return $this->regist_time;
    }

    /**
     * @param mixed $regist_time
     */
    public function setRegistTime($regist_time)
    {
        $this->regist_time = $regist_time;
    }

    /**
     * @return mixed
     */
    public function getEditTime()
    {
        return $this->edit_time;
    }

    /**
     * @param mixed $edit_time
     */
    public function setEditTime($edit_time)
    {
        $this->edit_time = $edit_time;
    }
}