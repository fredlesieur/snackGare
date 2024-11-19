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
    


   // Exemple : Affiche la liste des utilisateurs
   public function listUsers()
   {
       $users = []; // Appelle ici ton modèle UserModel si nécessaire
       $this->render('users/list', [
           'title' => 'Liste des utilisateurs',
           'users' => $users,
       ]);
   }

   // Exemple : Affiche une autre page comme la gestion des pages
   public function managePages()
   {
       $pages = []; // Appelle ici ton modèle PageModel si nécessaire
       $this->render('pages/list', [
           'title' => 'Gestion des pages',
           'pages' => $pages,
       ]);
   } 
}
