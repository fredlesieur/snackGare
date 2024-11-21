<?php

namespace App\Models;

class PageModel extends Model
{
    protected $id;
    protected $tittle;



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
     * Get the value of tittle
     */ 
    public function getTittle()
    {
        return $this->tittle;
    }

    /**
     * Set the value of tittle
     *
     * @return  self
     */ 
    public function setTittle($tittle)
    {
        $this->tittle = $tittle;

        return $this;
    }

    
}