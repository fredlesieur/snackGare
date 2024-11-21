<?php

namespace App\Controllers;

use App\Repositories\PageRepository;
use App\Repositories\SectionRepository;
use App\Repositories\AvisRepository;
use App\Repositories\HoraireRepository;

class HomeController extends Controller
{
    private $pageRepository;
    private $sectionRepository;
    private $avisRepository;
    private $horaireRepository;

    public function __construct()
    {
        $this->pageRepository = new PageRepository();
        $this->sectionRepository = new SectionRepository();
        $this->avisRepository = new AvisRepository();
        $this->horaireRepository = new HoraireRepository();
    }

    public function index()
    {
        $page = $this->pageRepository->findPageById(1);
        if (!$page) {
            $page = ['id' => 1, 'title' => 'Accueil'];
        }

        $sections = $this->sectionRepository->findByPageId($page['id']) ?? [];
        $avis = $this->avisRepository->getApprovedAvis() ?? [];
        $horaires = $this->horaireRepository->findByPageId($page['id']) ?? [];

        $this->render('home', [
            'title' => 'Accueil',
            'page' => $page,
            'sections' => $sections,
            'avis' => $avis,
            'horaires' => $horaires,
        ]);
    }
}
