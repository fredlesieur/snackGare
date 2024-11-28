<?php

namespace App\Controllers;

use App\Services\AvisService;
use App\Utils\Redirect;

class AvisController extends Controller
{
    private $avisService;

    public function __construct()
    {
        $this->avisService = new AvisService();
    }
    public function form()
{
    $this->showForm();
}

    /**
     * Affiche le formulaire pour soumettre un avis.
     */
    public function showForm()
    {
        $this->render('avis/form', [
            'title' => 'Laisser un avis',
        ]);
    }

    /**
     * Traite l'ajout d'un avis.
     */
    public function add()
    {
        try {
            $nom = $_POST['nom'] ?? null;
            $commentaire = $_POST['commentaire'] ?? null;
            $rating = $_POST['rating'] ?? null;
    
            if (!$nom || !$commentaire || !$rating) {
                throw new \Exception("Tous les champs sont obligatoires.");
            }
    
            // Vérification de la validité de la note
            if ($rating < 1 || $rating > 5) {
                throw new \Exception("La note doit être comprise entre 1 et 5.");
            }
    
            // Appel au service
            $this->avisService->addReview([
                'nom' => $nom,
                'commentaire' => $commentaire,
                'rating' => $rating,
            ]);
    
            $_SESSION['success'] = "Votre avis a été soumis avec succès et sera examiné sous peu.";
            Redirect::to('/avis/form');
        } catch (\Exception $e) {
            // Log de l'erreur
            $_SESSION['error'] = "Erreur : " . $e->getMessage();
            Redirect::to('/avis/form');
        }
    }
    
    
    public function listPending()
{
    try {
        $reviews = $this->avisService->getPendingReviews(); // Récupérer les avis non validés
        $this->render('dashboard/avis/list', [
            'title' => 'Avis en attente',
            'reviews' => $reviews, // Transmettre les avis à la vue
        ], true);
    } catch (\Exception $e) {
        $_SESSION['error'] = "Erreur lors de la récupération des avis.";
        Redirect::to('/dashboard/index');
    }
}
    /**
     * Valide un avis.
     */
    public function approve()
    {
        $id = $_POST['id'];
        $this->avisService->approveReview((int) $id);
        Redirect::to('/avis/listPending');
    }

    /**
     * Supprime un avis.
     */
    public function delete()
    {
        $id = $_POST['id'];
        $this->avisService->deleteReview((int) $id);
        Redirect::to('/avis/listPending');
    }

    /**
     * Affiche les avis validés sur la page publique.
     */
    public function listApproved()
    {
        $reviews = $this->avisService->getApprovedReviews();
        $this->render('avis/index', [
            'title' => 'Avis clients',
            'reviews' => $reviews,
        ]);
    }
}
