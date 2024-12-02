<?php

namespace App\Controllers;

use App\Services\HoraireService;
use App\Utils\Redirect;

class HoraireController extends Controller
{
    private $horaireService;

    public function __construct()
    {
        parent::__construct();
        $this->horaireService = new HoraireService();
    }

    // Afficher tous les horaires
    public function list()
    {
        $horaires = $this->horaireService->getAllHoraires();
        $this->render('dashboard/horaires/list', ['title' => 'Liste des horaires', 'horaires' => $horaires], true);
    }

    // Afficher le formulaire pour ajouter un horaire
    public function showAddForm()
    {
        $this->render('dashboard/horaires/add', ['title' => 'Ajouter des horaires'], true);
    }

    // Ajouter un horaire
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si la case est cochée, si oui on met NULL dans les champs d'horaires
            $data = [
                'jours' => $_POST['jours'],
                'opening_time_lunch' => isset($_POST['is_closed_lunch']) ? NULL : $_POST['opening_time_lunch'],
                'closing_time_lunch' => isset($_POST['is_closed_lunch']) ? NULL : $_POST['closing_time_lunch'],
                'opening_time_dinner' => isset($_POST['is_closed_dinner']) ? NULL : $_POST['opening_time_dinner'],
                'closing_time_dinner' => isset($_POST['is_closed_dinner']) ? NULL : $_POST['closing_time_dinner'],
                'is_closed_lunch' => isset($_POST['is_closed_lunch']) ? 1 : 0,
                'is_closed_dinner' => isset($_POST['is_closed_dinner']) ? 1 : 0,
            ];
    
            // Appeler la méthode pour ajouter l'horaire
            $result = $this->horaireService->addHoraire($data);
    
            if ($result['success']) {
                $_SESSION['flash_success'] = $result['message'];
            } else {
                $_SESSION['flash_error'] = $result['message'];
            }
    
            Redirect::to('/horaire/list'); // Redirige vers la liste après l'ajout
        }
    }
    
    
    // Afficher le formulaire pour modifier un horaire
    public function edit(int $id)
    {
        $horaire = $this->horaireService->getHoraireById($id); // Assurez-vous que cette méthode retourne l'horaire
        if (!$horaire) {
            $_SESSION['error'] = "Horaire introuvable.";
            Redirect::to('/horaire/list');
            return;
        }

        $this->render('dashboard/horaires/edit', [
            'title' => 'Modifier un horaire',
            'horaire' => $horaire,
        ], true);
    }

    // Méthode pour mettre à jour un horaire
    public function update(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'jours' => $_POST['jours'],
                'opening_time_lunch' => isset($_POST['is_closed_lunch']) && $_POST['is_closed_lunch'] ? NULL : $_POST['opening_time_lunch'],
                'closing_time_lunch' => isset($_POST['is_closed_lunch']) && $_POST['is_closed_lunch'] ? NULL : $_POST['closing_time_lunch'],
                'opening_time_dinner' => isset($_POST['is_closed_dinner']) && $_POST['is_closed_dinner'] ? NULL : $_POST['opening_time_dinner'],
                'closing_time_dinner' => isset($_POST['is_closed_dinner']) && $_POST['is_closed_dinner'] ? NULL : $_POST['closing_time_dinner'],
                'is_closed_lunch' => isset($_POST['is_closed_lunch']) ? 1 : 0,
                'is_closed_dinner' => isset($_POST['is_closed_dinner']) ? 1 : 0,
            ];
            
            // Mise à jour de l'horaire
            $result = $this->horaireService->updateHoraire($id, $data);
    
            if ($result['success']) {
                $_SESSION['flash_success'] = $result['message'];
            } else {
                $_SESSION['flash_error'] = $result['message'];
            }
    
            Redirect::to('/horaire/list');
        } else {
            $_SESSION['flash_error'] = "Méthode non autorisée.";
            Redirect::to('/horaire/list');
        }
    }
    

    // Supprimer un horaire
    public function delete(int $id)
    {
        $result = $this->horaireService->deleteHoraire($id);

        if ($result['success']) {
            $_SESSION['success'] = $result['message'];
        } else {
            $_SESSION['error'] = $result['message'];
        }

        Redirect::to('/horaire/list');
    }
}
