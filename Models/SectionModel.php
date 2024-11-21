<?php

namespace App\Models;

class SectionModel extends Model
{
    protected $id;
    protected $page_id;
    protected $title;
    protected $display_order;
    protected $content;
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
