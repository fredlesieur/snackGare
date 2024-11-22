<?php

namespace App\Controllers;

use App\Services\HoraireService;
use App\Services\UserService;
use App\Utils\Redirect;

class DashboardController extends Controller
{
    private $horaireService;
    private $userService;

    public function __construct()
    {
        parent::__construct();
        $this->horaireService = new HoraireService();
        $this->userService = new UserService();
    }

    public function index()
    {
        $this->render('dashboard/home', ['title' => 'Bienvenue sur le Dashboard'], true);
    }

}
