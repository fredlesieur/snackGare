<?php

namespace App\Controllers;

use App\Services\BurgerService;
use App\Services\TacosService;
use App\Services\OptionService;
use App\Services\KebabService;
use App\Services\SaladeService;
use App\Services\SnackService;
use App\Services\BoissonService;

class MenuController extends Controller
{
    private $burgerService;
    private $tacosService;
    private $optionService;
    private $kebabService;
    private $saladeService;
    private $snackService;
    private $boissonService;

    public function __construct()
    {
        $this->burgerService = new BurgerService();
        $this->tacosService = new TacosService();
        $this->optionService = new OptionService();
        $this->kebabService = new KebabService();
        $this->saladeService = new SaladeService();
        $this->snackService = new SnackService();
        $this->boissonService = new BoissonService();
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
        $kebabOption = $this->optionService->getOptionById(2);

        // Récupère les kebabs
        $kebabs = $this->kebabService->getAllKebabs();

        // Récupérer toutes les salades
        $salades = $this->saladeService->getAllSalades();  

        // Récupérer tous les snacks
        $snacks = $this->snackService->getAllSnacks();

        // Récupérer toutes les boissons
        $boissons = $this->boissonService->getAllBoissons();
   
        // Passer les données à la vue
        $css = '/assets/css/menu.css';
        $this->render('menus/index', compact('css', 'burgers', 'tacos', 'options', 'kebabs', 'kebabOption', 'salades', 'snacks','boissons')); 
    }
}
