<?php

namespace App\Controllers;

use App\Repositories\AccueilRepository;

abstract class Controller
{
    // Déclaration du repository pour la page d'accueil
    protected $accueilRepository;

    public function __construct()
    {
        // On initialise le repository pour gérer les éléments de la page d'accueil
        $this->accueilRepository = new AccueilRepository();
    }

    /**
     * Méthode pour rendre une vue avec un layout.
     *
     * @param string $file Chemin de la vue à charger
     * @param array $donnees Données à passer à la vue
     * @param bool $isDashboard Indique si le layout à utiliser est celui du dashboard
     */
    public function render(string $file, array $donnees = [], bool $isDashboard = false): void
    {
     
        // Extraire les données pour la vue
        extract($donnees);

        // Démarrer la capture de sortie
        ob_start();

        // Charger le fichier de vue
        require_once ROOT . 'views/' . $file . '.php';

        // Récupérer le contenu généré par la vue
        $content = ob_get_clean();

        // Charger le layout approprié
        if ($isDashboard) {
            require_once ROOT . 'views/layouts/dashboard.php';
        } else {
            require_once ROOT . 'views/layouts/default.php';
        }
    }
}


