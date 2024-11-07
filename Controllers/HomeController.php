<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\SectionModel;
use App\Models\AvisModel;
use App\Models\HoraireModel;

class HomeController extends Controller
{
    public function index()
    {
        // Instanciation des modèles
        $pageModel = new PageModel();
        $sectionModel = new SectionModel();
        $avisModel = new AvisModel();
        $horaireModel = new HoraireModel();

        // Récupération des données de la page d'accueil
        $page = $pageModel->find(1); // Suppose que l'ID 1 correspond à la page d'accueil
        $sections = $sectionModel->findByPageId($page['id']);
        $avis = $avisModel->getApprovedAvis();
        $horaires = $horaireModel->findByPageId($page['id']);

        // Prépare les données à passer à la vue
        $data = [
            'title' => 'Accueil',
            'page' => $page,
            'sections' => $sections,
            'avis' => $avis,
            'horaires' => $horaires
        ];

        // Chargement de la vue
        $this->render('home', $data);
    }
}
