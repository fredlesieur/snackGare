<?php

namespace App\Models;

use App\Repositories\BaseRepository;

class AccueilModel extends BaseRepository
{
    protected $id;
    protected $title;
    protected $content;
    protected $display_order;

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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

   
    /**
     * Get the value of display_order
     */ 
    public function getDisplay_order()
    {
        return $this->display_order;
    }

    /**
     * Set the value of display_order
     *
     * @return  self
     */ 
    public function setDisplay_order($display_order)
    {
        $this->display_order = $display_order;

        return $this;
    }
}
