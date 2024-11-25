<?php

namespace App\Controllers;

use App\Repositories\PageRepository;
use App\Repositories\SectionRepository;
use App\Repositories\AvisRepository;
use App\Repositories\HoraireRepository;
use App\Repositories\ImageRepository; // Ajout du repository des images

class HomeController extends Controller
{
    public function index()
    {
        $pageRepo = new PageRepository();
        $sectionRepo = new SectionRepository();
        $avisRepo = new AvisRepository();
        $horaireRepo = new HoraireRepository(); // Repository pour les horaires
        $imageRepo = new ImageRepository(); // Repository pour les images

        // Récupération des données
        $page = $pageRepo->findPageById(1); // ID de la page d'accueil
        $sections = $sectionRepo->findByPageId(1); // Sections de la page d'accueil
        $avis = $avisRepo->getApprovedAvis(); // Avis approuvés
        $horaires = $horaireRepo->findAll(); // Récupérer les horaires pour le footer

        // Récupérer l'image de bordure via Cloudinary
        $borderImage = $imageRepo->findImageByAlt('decorative-border');

        // Chemin vers le fichier CSS spécifique à la page d'accueil
        $css = '/assets/css/home.css';

        // Passer les données à la vue
        $this->render('home', compact('page', 'sections', 'avis', 'horaires', 'css', 'borderImage'));
    }
}
