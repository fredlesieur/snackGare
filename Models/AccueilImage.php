<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class AccueilImageModel extends BaseRepository
{
    protected $id;
    protected $accueil_id;
    protected $image_id;
  

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
     * Get the value of accueil_id
     */ 
    public function getAccueil_id()
    {
        return $this->accueil_id;
    }

    /**
     * Set the value of accueil_id
     *
     * @return  self
     */ 
    public function setAccueil_id($accueil_id)
    {
        $this->accueil_id = $accueil_id;

        return $this;
    }

    /**
     * Get the value of image_id
     */ 
    public function getImage_id()
    {
        return $this->image_id;
    }

    /**
     * Set the value of image_id
     *
     * @return  self
     */ 
    public function setImage_id($image_id)
    {
        $this->image_id = $image_id;

        return $this;
    }
}