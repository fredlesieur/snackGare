<?php

namespace App\Controllers;

use App\Repositories\AvisRepository;

class AvisController extends Controller
{
    public function index()
    {
        $avisRepo = new AvisRepository();
        $avis = $avisRepo->findAll();

        $this->render('dashboard/avis/index', compact('avis'));
    }

    public function approve(int $id)
    {
        $avisRepo = new AvisRepository();
        $success = $avisRepo->update($id, ['statut' => 1]);

        if ($success) {
            header('Location: /dashboard/avis');
        } else {
            echo "Erreur lors de la validation de l'avis.";
        }
    }
}
