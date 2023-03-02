<?php

namespace App\Models;

use App\Models\Model;

class RestaurantModel extends Model
{
    protected int $id;
    protected string $name;
    protected string $noon_service_start;
    protected string $noon_service_end;
    protected string $evening_service_start;
    protected string $evening_service_end;
    protected int $max_capacity;
    protected int $day_close;

    public function __construct()
    {
        $this->table = "restaurant";
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of noon_service_start
     */
    public function getNoon_service_start()
    {
        return $this->noon_service_start;
    }

    /**
     * Set the value of noon_service_start
     *
     * @return  self
     */
    public function setNoon_service_start($noon_service_start)
    {
        $this->noon_service_start = $noon_service_start;

        return $this;
    }

    /**
     * Get the value of noon_service_end
     */
    public function getNoon_service_end()
    {
        return $this->noon_service_end;
    }

    /**
     * Set the value of noon_service_end
     *
     * @return  self
     */
    public function setNoon_service_end($noon_service_end)
    {
        $this->noon_service_end = $noon_service_end;

        return $this;
    }

    /**
     * Get the value of evening_service_start
     */
    public function getEvening_service_start()
    {
        return $this->evening_service_start;
    }

    /**
     * Set the value of evening_service_start
     *
     * @return  self
     */
    public function setEvening_service_start($evening_service_start)
    {
        $this->evening_service_start = $evening_service_start;

        return $this;
    }

    /**
     * Get the value of evening_service_end
     */
    public function getEvening_service_end()
    {
        return $this->evening_service_end;
    }

    /**
     * Set the value of evening_service_end
     *
     * @return  self
     */
    public function setEvening_service_end($evening_service_end)
    {
        $this->evening_service_end = $evening_service_end;

        return $this;
    }

    /**
     * Get the value of max_capacity
     */
    public function getMax_capacity()
    {
        return $this->max_capacity;
    }

    /**
     * Set the value of max_capacity
     *
     * @return  self
     */
    public function setMax_capacity($max_capacity)
    {
        $this->max_capacity = $max_capacity;

        return $this;
    }

    /**
     * Get the value of day_close
     */
    public function getDay_close()
    {
        return $this->day_close;
    }

    /**
     * Set the value of day_close
     *
     * @return  self
     */
    public function setDay_close($day_close)
    {
        $this->day_close = $day_close;

        return $this;
    }
}
