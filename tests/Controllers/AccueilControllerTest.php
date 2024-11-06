<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\AccueilController;

class AccueilControllerTest extends TestCase
{
    public function testIndex()
    {
        $controller = new AccueilController();
        ob_start();
        $controller->index();
        $output = ob_get_clean();

        $this->assertStringContainsString('Accueil', $output, 'La vue accueil doit contenir le mot Accueil');
    }
}
