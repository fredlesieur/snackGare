<?php

namespace App\Controllers;

use App\Repositories\PageRepository;
use App\Repositories\SectionRepository;
use App\Repositories\AvisRepository;
use App\Repositories\HoraireRepository;

class HomeController extends Controller
{
    private $sectionRepository;
    private $avisRepository;
    private $horaireRepository;

    public function __construct()
    {
        parent::__construct(); // Appel au constructeur parent pour initialiser `$pageRepository`
        $this->sectionRepository = new SectionRepository();
        $this->avisRepository = new AvisRepository();
        $this->horaireRepository = new HoraireRepository();
    }

    public function index()
    {
        // Charger les informations de la page Accueil
        $page = $this->pageRepository->findPageById(1);
        if (!$page) {
            $page = ['id' => 1, 'title' => 'Accueil'];
        }

        // Charger les sections, avis et horaires associés
        $sections = $this->sectionRepository->findByPageId($page['id']) ?? [];
        $avis = $this->avisRepository->getApprovedAvis() ?? [];
        $horaires = $this->horaireRepository->findAllHoraires($page['id']) ?? [];

        // Envoyer les données à la vue
        $this->render('home', [
            'title' => 'Accueil',
            'page' => $page,
            'sections' => $sections,
            'avis' => $avis,
            'horaires' => $horaires,
        ]);
    }
}
