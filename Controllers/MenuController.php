<?php

namespace App\Controllers;

class MenuController extends Controller
{
  
  
    public function index(): void

    {  
        $css='/assets/css/menu.css';
        $this->render('menus/index', compact('css'));
  
    }
}
