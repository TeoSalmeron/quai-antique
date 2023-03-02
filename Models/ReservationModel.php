<?php

namespace App\Models;

use DateTime;
use App\Models\Model;

class ReservationModel extends Model
{
    protected int $id;
    protected DateTime $res_date;
    protected DateTime $res_time;
    protected int $total_guest;
    protected string $booked_by;

    public function __construct()
    {
        $this->table = "reservation";
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
     * Get the value of res_date
     */
    public function getRes_date()
    {
        return $this->res_date;
    }

    /**
     * Set the value of res_date
     *
     * @return  self
     */
    public function setRes_date($res_date)
    {
        $this->res_date = $res_date;

        return $this;
    }

    /**
     * Get the value of res_time
     */
    public function getRes_time()
    {
        return $this->res_time;
    }

    /**
     * Set the value of res_time
     *
     * @return  self
     */
    public function setRes_time($res_time)
    {
        $this->res_time = $res_time;

        return $this;
    }

    /**
     * Get the value of total_guest
     */
    public function getTotal_guest()
    {
        return $this->total_guest;
    }

    /**
     * Set the value of total_guest
     *
     * @return  self
     */
    public function setTotal_guest($total_guest)
    {
        $this->total_guest = $total_guest;

        return $this;
    }

    /**
     * Get the value of booked_by
     */
    public function getBooked_by()
    {
        return $this->booked_by;
    }

    /**
     * Set the value of booked_by
     *
     * @return  self
     */
    public function setBooked_by($booked_by)
    {
        $this->booked_by = $booked_by;

        return $this;
    }
}
