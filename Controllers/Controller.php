<?php

namespace App\Controllers;

use App\Repositories\AccueilRepository;

abstract class Controller
{
    protected $accueilRepository;

    public function __construct()
    {
        $this->accueilRepository = new AccueilRepository();
    }

    /**
     * Méthode pour rendre une vue avec un layout.
     *
     * @param string $file Chemin de la vue à charger
     * @param array $donnees Données à passer à la vue
     */
    public function render(string $file, array $donnees = []): void
    {
        // Ajouter les horaires si présents
        $donnees['horaires'] = $_SESSION['horaires'] ?? [];

        // Extraire les données pour la vue
        extract($donnees);

        // Capturer la sortie de la vue
        ob_start();
        $fullPath = ROOT . '/views/' . $file . '.php';
        if (!file_exists($fullPath)) {
            die("Fichier introuvable : $fullPath");
        }
        require_once $fullPath;
        $content = ob_get_clean();

        // Détecter automatiquement le layout en fonction du chemin de la vue
        $isDashboard = strpos($file, 'dashboard/') === 0;

        // Charger le layout approprié
        $layoutPath = ROOT . '/views/layouts/' . ($isDashboard ? 'dashboard' : 'default') . '.php';
        if (!file_exists($layoutPath)) {
            die("Layout introuvable : $layoutPath");
        }
        require_once $layoutPath;
    }
}
