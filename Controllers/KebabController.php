<?php

namespace App\Controllers;

use App\Repositories\KebabRepository;
use App\Utils\Redirect;

class KebabController extends Controller
{
    private $kebabRepository;

    public function __construct()
    {
        $this->kebabRepository = new KebabRepository();
    }

    /**
     * Affiche la liste des kebabs
     */
    public function list(): void
    {
        $kebabs = $this->kebabRepository->findAllKebabs();
        $this->render('dashboard/kebabs/list', ['kebabs' => $kebabs]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function add(): void
    {
        $this->render('dashboard/kebabs/add');
    }

    /**
     * Affiche le formulaire de modification
     * @param int $id
     */
    public function edit(int $id): void
    {
        $kebab = $this->kebabRepository->findKebabById($id);

        if (!$kebab) {
            throw new \Exception("Kebab non trouvé");
        }

        $this->render('dashboard/kebabs/edit', ['kebab' => $kebab]);
    }

    /**
     * Traite l'ajout ou la modification d'un kebab
     */
    public function save(): void
    {
        $data = $_POST;

        // Filtrer les champs
        $filteredData = [
            'name' => $data['name'] ?? null,
            'description' => $data['description'] ?? null,
            'price_sandwich' => $data['price_sandwich'] ?? null,
            'price_menu' => $data['price_menu'] ?? null,
            'price_plate' => $data['price_plate'] ?? null,
        ];

        if (isset($data['id']) && !empty($data['id'])) {
            // Mise à jour
            $success = $this->kebabRepository->updateKebab((int)$data['id'], $filteredData);
        } else {
            // Création
            $success = $this->kebabRepository->createKebab($filteredData);
        }

        if ($success) {
            $_SESSION['flash_success'] = "Le kebab a été enregistré avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement.";
        }

        Redirect::to('/kebab/list');
    }

    /**
     * Supprime un kebab
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->kebabRepository->deleteKebab($id);
        Redirect::to('/kebab/list');
    }
}
