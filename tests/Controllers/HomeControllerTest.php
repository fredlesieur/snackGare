<?php

namespace Tests\Controllers;
use PHPUnit\Framework\TestCase;
use App\Controllers\HomeController;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $controller = new HomeController();
        ob_start();
        $controller->index();
        $output = ob_get_clean();

        $this->assertStringContainsString('Accueil', $output, 'La vue accueil doit contenir le mot Accueil');
    }
}
