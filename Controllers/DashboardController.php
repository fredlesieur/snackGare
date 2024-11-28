<?php

namespace App\Controllers;


class DashboardController extends Controller
{
  

    public function __construct()
    {
        parent::__construct();
      
    }

    public function index()
    {
        $this->render('dashboard/home', ['title' => 'Bienvenue sur le Dashboard'], true);
    }

   


}
