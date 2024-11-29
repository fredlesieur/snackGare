<?php

namespace App\Controllers;

use App\Repositories\SnackRepository;
use App\Utils\Redirect;

class SnackController extends Controller
{
    private $snackRepository;

    public function __construct()
    {
        $this->snackRepository = new SnackRepository();
    }

    /**
     * Affiche la liste des snacks
     */
    public function list(): void
    {
        $snacks = $this->snackRepository->findAllSnacks();
        $this->render('dashboard/snacks/list', ['snacks' => $snacks]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function add(): void
    {
        $this->render('dashboard/snacks/add');
    }

    /**
     * Affiche le formulaire de modification
     * @param int $id
     */
    public function edit(int $id): void
    {
        $snack = $this->snackRepository->findSnackById($id);

        if (!$snack) {
            throw new \Exception("Snack non trouvé");
        }

        $this->render('dashboard/snacks/edit', ['snack' => $snack]);
    }

    /**
     * Traite l'ajout ou la modification d'un snack
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
            $success = $this->snackRepository->updateSnack((int)$data['id'], $filteredData);
        } else {
            // Création
            $success = $this->snackRepository->createSnack($filteredData);
        }

        if ($success) {
            $_SESSION['flash_success'] = "Le snack a été enregistré avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement.";
        }

        Redirect::to('/snack/list');
    }

    /**
     * Supprime un snack
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->snackRepository->deleteSnack($id);
        Redirect::to('/snack/list');
    }
}
