<?php

namespace App\Controllers;


use App\Repositories\HoraireRepository;


class HomeController extends Controller
{
    
    public function index()
    {
        $css = '/assets/css/home.css';
      
        $horaireRepo = new HoraireRepository();

        // Récupération des données dynamiques
    
        $horaires = $horaireRepo->findAll(); // Horaires

        // Rendre la vue avec les données dynamiques
        $this->render('home', compact('horaires', 'css'));
    }
}
