<?php

namespace App\Models;

use App\Models\Model;

class CustomerModel extends Model
{
    protected string $id;
    protected string $password;
    protected int $default_nb_guest;

    public function __construct()
    {
        $this->table = "customer";
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
     * Get the value of default_nb_guest
     */
    public function getDefault_nb_guest()
    {
        return $this->default_nb_guest;
    }

    /**
     * Set the value of default_nb_guest
     *
     * @return  self
     */
    public function setDefault_nb_guest($default_nb_guest)
    {
        $this->default_nb_guest = $default_nb_guest;

        return $this;
    }
}
