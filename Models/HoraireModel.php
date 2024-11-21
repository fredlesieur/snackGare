<?php

namespace App\Models;

class HoraireModel extends Model
{
    protected $id;
    protected $jour;
    protected $opening_time;
    protected $closing_time;
    protected $page_id;

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
     * Get the value of opening_time
     */ 
    public function getOpening_time()
    {
        return $this->opening_time;
    }

    /**
     * Set the value of opening_time
     *
     * @return  self
     */ 
    public function setOpening_time($opening_time)
    {
        $this->opening_time = $opening_time;

        return $this;
    }

    /**
     * Get the value of closing_time
     */ 
    public function getClosing_time()
    {
        return $this->closing_time;
    }

    /**
     * Set the value of closing_time
     *
     * @return  self
     */ 
    public function setClosing_time($closing_time)
    {
        $this->closing_time = $closing_time;

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
}
