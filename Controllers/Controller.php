<?php

namespace App\Controllers;



abstract class Controller
{
    public function render(string $file, array $donnees = []): void
    {
        // Extraire les données à utiliser dans la vue
        extract($donnees);

        // Démarrer la capture de sortie
        ob_start();

        // Charger le fichier de vue
        require_once ROOT . 'views/' . $file . '.php';

        // Récupérer le contenu généré par la vue
        $content = ob_get_clean();

        // Charger la page de layout default.php avec le contenu de la vue
        require_once ROOT . 'views/default.php';
    }
}
