<?php

namespace App\Controllers;

use App\Repositories\TacosRepository;
use App\Utils\Redirect;

class TacosController extends Controller
{
    private $tacosRepository;

    public function __construct()
    {
        $this->tacosRepository = new TacosRepository();
    }

    /**
     * Affiche la liste des formules de tacos
     */
    public function list(): void
    {
        $tacos = $this->tacosRepository->findAllTacos();
        $this->render('dashboard/tacos/list', ['tacos' => $tacos]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function add(): void
    {
        $this->render('dashboard/tacos/add');
    }

    /**
     * Affiche le formulaire de modification
     * @param int $id
     */
    public function edit(int $id): void
    {
        $taco = $this->tacosRepository->findTacoById($id);

        if (!$taco) {
            throw new \Exception("Taco non trouvé");
        }

        $this->render('dashboard/tacos/edit', ['taco' => $taco]);
    }

    /**
     * Traite l'ajout ou la modification d'une formule
     */
    public function save(): void
    {
        $data = $_POST;

        // Filtrer les champs pour éviter les erreurs
        $filteredData = [
            'name' => $data['name'] ?? null,
            'description' => $data['description'] ?? null,
            'price_solo' => $data['price_solo'] ?? null,
            'price_menu' => $data['price_menu'] ?? null,
        ];

        if (isset($data['id']) && !empty($data['id'])) {
            // Mise à jour
            $success = $this->tacosRepository->updateTaco((int)$data['id'], $filteredData);
        } else {
            // Création
            $success = $this->tacosRepository->createTaco($filteredData);
        }

        // Messages flash
        if ($success) {
            $_SESSION['flash_success'] = "La formule de tacos a été enregistrée avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement.";
        }

        Redirect::to('/tacos/list');
    }

    /**
     * Supprime une formule
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->tacosRepository->deleteTaco($id);
        Redirect::to('/tacos/list');
    }
}
