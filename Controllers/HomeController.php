<?php

namespace App\Controllers;

use App\Repositories\AccueilRepository;
use App\Repositories\AvisRepository;
use App\Repositories\HoraireRepository;


class HomeController extends Controller
{
    
    public function index()
    {
        $css = '/assets/css/home.css';
      
        $horaireRepo = new HoraireRepository();
        $horaires = $horaireRepo->findAll(); // Horaires

        $accueilRepo = new AccueilRepository();
        $sections = $accueilRepo->findAllWithImages(); // Accueils

        $avisRepository = new AvisRepository();
       $avis = $avisRepository->findBy(['statut' => 1]);

        // Rendre la vue avec les données dynamiques
        $this->render('home/index', compact('horaires', 'sections', 'avis', 'css'));
    }
}
