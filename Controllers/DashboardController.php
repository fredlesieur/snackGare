<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    // Affiche l'accueil du dashboard
    public function index()
    {
        $this->renderDashboard('home', [
            'title' => 'Bienvenue sur le Dashboard',
        ]);
    }

    // Exemple : Affiche la liste des utilisateurs
    public function listUsers()
    {
        $users = []; // Appelle ici ton modèle UserModel si nécessaire
        $this->renderDashboard('users/list', [
            'title' => 'Liste des utilisateurs',
            'users' => $users,
        ]);
    }

    // Exemple : Affiche une autre page comme la gestion des pages
    public function managePages()
    {
        $pages = []; // Appelle ici ton modèle PageModel si nécessaire
        $this->renderDashboard('pages/list', [
            'title' => 'Gestion des pages',
            'pages' => $pages,
        ]);
    }

    // Méthode pour charger les vues spécifiques au dashboard
    private function renderDashboard(string $file, array $data = [])
    {
        extract($data);

        // Capture le contenu de la vue
        ob_start();
        require_once ROOT . 'views/dashboard/' . $file . '.php';
        $content = ob_get_clean();

        // Charge le layout principal du dashboard
        require_once ROOT . 'views/dashboard/layout.php';
    }
}
