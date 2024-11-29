<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class KebabModel extends BaseRepository
{
    protected $id;
    protected $name;
    protected $description;
    protected $price_sandwich;
    protected $price_menu;
    protected $price_plate;

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
     * Get the value of price_sandwich
     */ 
    public function getPrice_sandwich()
    {
        return $this->price_sandwich;
    }

    /**
     * Set the value of price_sandwich
     *
     * @return  self
     */ 
    public function setPrice_sandwich($price_sandwich)
    {
        $this->price_sandwich = $price_sandwich;

        return $this;
    }

    /**
     * Get the value of price_menu
     */ 
    public function getPrice_menu()
    {
        return $this->price_menu;
    }

    /**
     * Set the value of price_menu
     *
     * @return  self
     */ 
    public function setPrice_menu($price_menu)
    {
        $this->price_menu = $price_menu;

        return $this;
    }

    /**
     * Get the value of price_plate
     */ 
    public function getPrice_plate()
    {
        return $this->price_plate;
    }

    /**
     * Set the value of price_plate
     *
     * @return  self
     */ 
    public function setPrice_plate($price_plate)
    {
        $this->price_plate = $price_plate;

        return $this;
    }
}