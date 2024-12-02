<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class BoissonModel extends BaseRepository
{
    protected $id;
    protected $name;
    protected $description;
    protected $price_bottle;
    protected $price_can;

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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price_bottle
     */ 
    public function getPrice_bottle()
    {
        return $this->price_bottle;
    }

    /**
     * Set the value of price_bottle
     *
     * @return  self
     */ 
    public function setPrice_bottle($price_bottle)
    {
        $this->price_bottle = $price_bottle;

        return $this;
    }

    /**
     * Get the value of price_can
     */ 
    public function getPrice_can()
    {
        return $this->price_can;
    }

    /**
     * Set the value of price_can
     *
     * @return  self
     */ 
    public function setPrice_can($price_can)
    {
        $this->price_can = $price_can;

        return $this;
    }
}