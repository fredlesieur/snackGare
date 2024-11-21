<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $this->render('dashboard/home', ['title' => 'Bienvenue sur le Dashboard'],true);
    }

    public function showRegisterForm()
    {
        // Affiche le formulaire d'inscription dans le layout dashboard
        $this->render('dashboard/register', ['title' => 'Créer un utilisateur'], true);
    }
    

}
