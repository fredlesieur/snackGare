<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\SectionModel;
use App\Models\AvisModel;
use App\Models\HoraireModel;

class HomeController extends Controller
{
    private $pageModel;
    private $sectionModel;
    private $avisModel;
    private $horaireModel;
    public $data = [];  // Attribut pour stocker les données

    public function __construct(PageModel $pageModel = null, SectionModel $sectionModel = null, AvisModel $avisModel = null, HoraireModel $horaireModel = null)
    {
        $this->pageModel = $pageModel ?? new PageModel();
        $this->sectionModel = $sectionModel ?? new SectionModel();
        $this->avisModel = $avisModel ?? new AvisModel();
        $this->horaireModel = $horaireModel ?? new HoraireModel();
    }

    public function index()
    {
        // Récupérer la page
        $page = $this->pageModel->find(1); // Assurez-vous que cela renvoie une page valide
        if (!$page) {
            // Gérer le cas où la page n'existe pas
            $page = ['id' => 1, 'title' => 'Accueil']; // Valeurs par défaut
        }
    
        $pageId = $page['id'];
    
        // Assurez-vous que les modèles renvoient des données
        $sections = $this->sectionModel->findByPageId($pageId) ?? [];
        $avis = $this->avisModel->getApprovedAvis() ?? [];
        $horaires = $this->horaireModel->findByPageId($pageId) ?? [];
    
        // Stocker les données pour la vue
        $this->data = [
            'title' => 'Accueil',
            'page' => $page,
            'sections' => $sections,
            'avis' => $avis,
            'horaires' => $horaires,
        ];
    
        $this->render('home', $this->data);
    }
    

}
