<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    /**
     * Affiche une page d'erreur 404.
     *
     * @param string $message Message d'erreur à afficher
     */
    public function notFound($message = "Page non trouvée.")
    {
        // Prépare les données pour la vue d'erreur
        $data = [
            'title' => 'Erreur 404',
            'message' => $message
        ];

        // Appelle la méthode render pour charger la vue "error404"
        $this->render('error404', $data);
    }
}
