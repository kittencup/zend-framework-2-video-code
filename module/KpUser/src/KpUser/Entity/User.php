<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-27 下午3:02
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpUser\Entity;

class User
{
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $oldPassword;
    protected $lastPasswordChangeTime;
    protected $regData;
    protected $lastLoginDate;
    protected $regIp;
    protected $lastLoginIp;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $lastLoginDate
     */
    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;
    }

    /**
     * @return mixed
     */
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    /**
     * @param mixed $lastLoginIp
     */
    public function setLastLoginIp($lastLoginIp)
    {
        $this->lastLoginIp = $lastLoginIp;
    }

    /**
     * @return mixed
     */
    public function getLastLoginIp()
    {
        return $this->lastLoginIp;
    }

    /**
     * @param mixed $lastPasswordChangeTime
     */
    public function setLastPasswordChangeTime($lastPasswordChangeTime)
    {
        $this->lastPasswordChangeTime = $lastPasswordChangeTime;
    }

    /**
     * @return mixed
     */
    public function getLastPasswordChangeTime()
    {
        return $this->lastPasswordChangeTime;
    }

    /**
     * @param mixed $oldPassword
     */
    public function setOldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * @return mixed
     */
    public function getOldPassword()
    {
        return $this->oldPassword;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $regData
     */
    public function setRegData($regData)
    {
        $this->regData = $regData;
    }

    /**
     * @return mixed
     */
    public function getRegData()
    {
        return $this->regData;
    }

    /**
     * @param mixed $regIp
     */
    public function setRegIp($regIp)
    {
        $this->regIp = $regIp;
    }

    /**
     * @return mixed
     */
    public function getRegIp()
    {
        return $this->regIp;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


}