<?php

namespace App\Controllers;

use App\Repositories\BoissonRepository;
use App\Utils\Redirect;

class BoissonController extends Controller
{
    private $boissonRepository;

    public function __construct()
    {
        $this->boissonRepository = new BoissonRepository();
    }

    /**
     * Affiche la liste des boissons
     */
    public function list(): void
    {
        $boissons = $this->boissonRepository->findAllBoissons();
        $this->render('dashboard/boissons/list', ['boissons' => $boissons]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function add(): void
    {
        $this->render('dashboard/boissons/add');
    }

    /**
     * Affiche le formulaire de modification
     * @param int $id
     */
    public function edit(int $id): void
    {
        $boisson = $this->boissonRepository->findBoissonById($id);

        if (!$boisson) {
            throw new \Exception("Boisson non trouvée");
        }

        $this->render('dashboard/boissons/edit', ['boisson' => $boisson]);
    }

    /**
     * Traite l'ajout ou la modification d'une boisson
     */
    public function save(): void
    {
        $data = $_POST;

        // Filtrer les champs
        $filteredData = [
            'name' => $data['name'] ?? null,
            'description' => $data['description'] ?? null,
            'price_bottle' => $data['price_bottle'] !== '' ? $data['price_bottle'] : null,
            'price_can' => $data['price_can'] !== '' ? $data['price_can'] : null,
        ];

        if (isset($data['id']) && !empty($data['id'])) {
            // Mise à jour
            $success = $this->boissonRepository->updateBoisson((int)$data['id'], $filteredData);
        } else {
            // Création
            $success = $this->boissonRepository->createBoisson($filteredData);
        }

        if ($success) {
            $_SESSION['flash_success'] = "La boisson a été enregistrée avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement.";
        }

        Redirect::to('/boisson/list');
    }

    /**
     * Supprime une boisson
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->boissonRepository->deleteBoisson($id);
        Redirect::to('/boisson/list');
    }
}
