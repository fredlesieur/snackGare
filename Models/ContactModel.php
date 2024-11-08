<?php

namespace App\Models;

class ContactModel extends Model
{
    protected $id;
    protected $image;
  

    protected $table = 'contact';

    public function __construct()
    {
        $this->table = "contact";
    }



    public function createContact($image)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (image) VALUES (:image)",
            ['image' => $image]
        );
    
    }
}