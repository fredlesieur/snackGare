<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class ImageModel extends BaseRepository
{
    protected $id;
    protected $url;
    protected $alt_text;
    protected $created_at;


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
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of alt_text
     */ 
    public function getAlt_text()
    {
        return $this->alt_text;
    }

    /**
     * Set the value of alt_text
     *
     * @return  self
     */ 
    public function setAlt_text($alt_text)
    {
        $this->alt_text = $alt_text;

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
}