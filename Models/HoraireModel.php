<?php

namespace App\Models;

class HoraireModel extends Model
{
    protected $id;
    protected $jour;
    protected $opening_time_lunch;
    protected $closing_time_lunch;
    protected $opening_time_dinner;
    protected $closing_time_dinner;
    protected $page_id;
    protected $is_closed;

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
     * Get the value of jour
     */ 
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set the value of jour
     *
     * @return  self
     */ 
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }


    /**
     * Get the value of page_id
     */ 
    public function getPage_id()
    {
        return $this->page_id;
    }

    /**
     * Set the value of page_id
     *
     * @return  self
     */ 
    public function setPage_id($page_id)
    {
        $this->page_id = $page_id;

        return $this;
    }

    /**
     * Get the value of opening_time_lunch
     */ 
    public function getOpening_time_lunch()
    {
        return $this->opening_time_lunch;
    }

    /**
     * Set the value of opening_time_lunch
     *
     * @return  self
     */ 
    public function setOpening_time_lunch($opening_time_lunch)
    {
        $this->opening_time_lunch = $opening_time_lunch;

        return $this;
    }

    /**
     * Get the value of closing_time_lunch
     */ 
    public function getClosing_time_lunch()
    {
        return $this->closing_time_lunch;
    }

    /**
     * Set the value of closing_time_lunch
     *
     * @return  self
     */ 
    public function setClosing_time_lunch($closing_time_lunch)
    {
        $this->closing_time_lunch = $closing_time_lunch;

        return $this;
    }

    /**
     * Get the value of opening_time_dinner
     */ 
    public function getOpening_time_dinner()
    {
        return $this->opening_time_dinner;
    }

    /**
     * Set the value of opening_time_dinner
     *
     * @return  self
     */ 
    public function setOpening_time_dinner($opening_time_dinner)
    {
        $this->opening_time_dinner = $opening_time_dinner;

        return $this;
    }

    /**
     * Get the value of closing_time_dinner
     */ 
    public function getClosing_time_dinner()
    {
        return $this->closing_time_dinner;
    }

    /**
     * Set the value of closing_time_dinner
     *
     * @return  self
     */ 
    public function setClosing_time_dinner($closing_time_dinner)
    {
        $this->closing_time_dinner = $closing_time_dinner;

        return $this;
    }

    /**
     * Get the value of is_closed
     */ 
    public function getIs_closed()
    {
        return $this->is_closed;
    }

    /**
     * Set the value of is_closed
     *
     * @return  self
     */ 
    public function setIs_closed($is_closed)
    {
        $this->is_closed = $is_closed;

        return $this;
    }
}
