<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class HoraireModel extends BaseRepository
{
    protected $id;
    protected $jours;
    protected $opening_time_lunch;
    protected $closing_time_lunch;
    protected $opening_time_dinner;
    protected $closing_time_dinner;
    protected $is_closed_lunch;
    protected $is_closed_dinner;
    protected $created_at;
    protected $updated_at;

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
    public function getJours()
    {
        return $this->jours;
    }

    /**
     * Set the value of jour
     *
     * @return  self
     */ 
    public function setJours($jours)
    {
        $this->jours = $jours;

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
     * Get the value of is_closed_lunch
     */ 
    public function getIs_closed_lunch()
    {
        return $this->is_closed_lunch;
    }

    /**
     * Set the value of is_closed_lunch
     *
     * @return  self
     */ 
    public function setIs_closed_lunch($is_closed_lunch)
    {
        $this->is_closed_lunch = $is_closed_lunch;

        return $this;
    }

    /**
     * Get the value of is_closed_dinner
     */ 
    public function getIs_closed_dinner()
    {
        return $this->is_closed_dinner;
    }

    /**
     * Set the value of is_closed_dinner
     *
     * @return  self
     */ 
    public function setIs_closed_dinner($is_closed_dinner)
    {
        $this->is_closed_dinner = $is_closed_dinner;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
