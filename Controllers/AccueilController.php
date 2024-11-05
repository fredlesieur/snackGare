<?php

namespace App\Controllers;

class AccueilController extends Controller
{
    /**
     * Affiche la page d'accueil.
     */
    public function index()
    {
        // Prépare les données à passer à la vue, si nécessaire
        $data = [
            'title' => 'Accueil',
            // Ajoute d'autres données ici si besoin
        ];

        // Appelle la méthode render pour charger la vue "accueil"
        $this->render('accueil', $data);
    }
}
