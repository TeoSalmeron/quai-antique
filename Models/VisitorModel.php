<?php

namespace App\Models;

use App\Models\Model;

class VisitorModel extends Model
{
    protected string $id;

    public function __construct()
    {
        $this->table = "visitor";
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
}
