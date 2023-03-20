<?php

namespace App\Models;

use App\Models\Model;

class UsersAllergenModel extends Model
{
    protected string $user_id;
    protected int $allergen_id;

    public function __construct()
    {
        $this->table = "users_allergen";
    }

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of allergen_id
     */
    public function getAllergen_id()
    {
        return $this->allergen_id;
    }

    /**
     * Set the value of allergen_id
     *
     * @return  self
     */
    public function setAllergen_id($allergen_id)
    {
        $this->allergen_id = $allergen_id;

        return $this;
    }
}
