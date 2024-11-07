<?php

namespace App\Controllers;

class HomeController extends Controller
{
   
    public function index()
    {
        // Prépare les données à passer à la vue, si nécessaire
        $data = [
            'title' => 'Accueil',
            
        ];

        
        $this->render('home', $data);
    }
}
