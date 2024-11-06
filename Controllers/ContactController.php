<?php

namespace App\Controllers;

class ContactController extends Controller
{
 
    public function index()
    {
        // Appelle la méthode render pour afficher la vue "contact"
        $this->render('contact');
    }
    
}
