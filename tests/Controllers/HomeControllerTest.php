<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\HomeController;
use App\Models\PageModel;
use App\Models\SectionModel;
use App\Models\AvisModel;
use App\Models\HoraireModel;

class HomeControllerTest extends TestCase
{
    private $controller;
    private $pageModel;
    private $sectionModel;
    private $avisModel;
    private $horaireModel;

    protected function setUp(): void
    {
        $this->pageModel = $this->createMock(PageModel::class);
        $this->sectionModel = $this->createMock(SectionModel::class);
        $this->avisModel = $this->createMock(AvisModel::class);
        $this->horaireModel = $this->createMock(HoraireModel::class);

        $this->pageModel->method('find')->willReturn(['id' => 1, 'title' => 'Accueil']);
        $this->sectionModel->method('findByPageId')->willReturn([['title' => 'Section Test', 'content' => 'Contenu test']]);
        $this->avisModel->method('getApprovedAvis')->willReturn([['nom' => 'Test User', 'commentaire' => 'Super avis']]);
        $this->horaireModel->method('findByPageId')->willReturn([['jours' => 'Lundi', 'opening_time' => '08:00', 'closing_time' => '18:00']]);

        $this->controller = new HomeController($this->pageModel, $this->sectionModel, $this->avisModel, $this->horaireModel);
    }

    public function testIndex()
    {
        // Capture la sortie HTML sans l'afficher
        ob_start();
        $this->controller->index();
        ob_end_clean();

        // Vérifiez uniquement les assertions sur les données sans afficher le HTML
        $data = $this->controller->data ?? [];
        $this->assertArrayHasKey('page', $data);
        $this->assertArrayHasKey('sections', $data);
        $this->assertArrayHasKey('avis', $data);
        $this->assertArrayHasKey('horaires', $data);
    }
}
