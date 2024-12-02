<?php

namespace App\Controllers;

use App\Repositories\SaladeRepository;
use App\Utils\Redirect;

class SaladeController extends Controller
{
    private $saladeRepository;

    public function __construct()
    {
        $this->saladeRepository = new SaladeRepository();
    }

    /**
     * Affiche la liste des salades
     */
    public function list(): void
    {
        $salades = $this->saladeRepository->findAllSalades();
        $this->render('dashboard/salades/list', ['salades' => $salades]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function add(): void
    {
        $this->render('dashboard/salades/add');
    }

    /**
     * Affiche le formulaire de modification
     * @param int $id
     */
    public function edit(int $id): void
    {
        $salade = $this->saladeRepository->findSaladeById($id);

        if (!$salade) {
            throw new \Exception("Salade non trouvée");
        }

        $this->render('dashboard/salades/edit', ['salade' => $salade]);
    }

    /**
     * Traite l'ajout ou la modification d'une salade
     */
    public function save(): void
    {
        $data = $_POST;

        // Filtrer les champs
        $filteredData = [
            'name' => $data['name'] ?? null,
            'description' => $data['description'] ?? null,
            'price' => $data['price'] ?? null,
        ];

        if (isset($data['id']) && !empty($data['id'])) {
            // Mise à jour
            $success = $this->saladeRepository->updateSalade((int)$data['id'], $filteredData);
        } else {
            // Création
            $success = $this->saladeRepository->createSalade($filteredData);
        }

        if ($success) {
            $_SESSION['flash_success'] = "La salade a été enregistrée avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement.";
        }

        Redirect::to('/salade/list');
    }

    /**
     * Supprime une salade
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->saladeRepository->deleteSalade($id);
        Redirect::to('/salade/list');
    }
}
