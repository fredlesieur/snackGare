<?php

namespace App\Controllers;

use App\Repositories\AccueilRepository;
use App\Repositories\AvisRepository;



class HomeController extends Controller
{
    
    public function index()
    {
        $css = '/assets/css/home.css';
      

        $accueilRepo = new AccueilRepository();
        $sections = $accueilRepo->findAllWithImages(); // Accueils

        $avisRepository = new AvisRepository();
        $avis = $avisRepository->findBy(['statut' => 1]);

        // Rendre la vue avec les données dynamiques
        $this->render('home/index', compact('sections', 'avis', 'css'));
    }
}
