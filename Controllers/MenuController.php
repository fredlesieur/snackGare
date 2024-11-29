<?php

namespace App\Controllers;

use App\Services\BurgerService;
use App\Services\TacosService;
use App\Services\OptionService;
use App\Services\KebabService;

class MenuController extends Controller
{
    private $burgerService;
    private $tacosService;
    private $optionService;
    private $kebabService;

    public function __construct()
    {
        $this->burgerService = new BurgerService();
        $this->tacosService = new TacosService();
        $this->optionService = new OptionService();
        $this->kebabService = new KebabService();
    }

    /**
     * Affiche la page du menu
     */
    public function index(): void
    {
        // Récupérer les burgers
        $burgers = $this->burgerService->getAllBurgers();

        // Récupérer les tacos
        $tacos = $this->tacosService->getAllTacos();

        // Récupérer les options
        $options = $this->optionService->getAllOptions();

        // Récupère les kebabs
        $kebabs = $this->kebabService->getAllKebabs();

        // Passer les données à la vue
        $css = '/assets/css/menu.css';
        $this->render('menus/index', compact('css', 'burgers', 'tacos', 'options', 'kebabs')); // Ajout des options
    }
}
