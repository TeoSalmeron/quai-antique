<?php

namespace App\Models;

use App\Models\Model;

class AdministratorModel extends Model
{
    protected int $id;
    protected string $email;
    protected string $password;
    protected int $manage;
    protected int $confirmed;


    public function __construct()
    {
        $this->table = "administrator";
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of manage
     */
    public function getManage()
    {
        return $this->manage;
    }

    /**
     * Set the value of manage
     *
     * @return  self
     */
    public function setManage($manage)
    {
        $this->manage = $manage;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of confirmed
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set the value of confirmed
     *
     * @return  self
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }
}
