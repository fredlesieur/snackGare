<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class BurgerModel extends BaseRepository
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $price_menu;

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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

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
}