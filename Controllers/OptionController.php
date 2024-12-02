<?php

namespace App\Controllers;

use App\Repositories\OptionRepository;
use App\Utils\Redirect;

class OptionController extends Controller
{
    private $optionRepository;

    public function __construct()
    {
        $this->optionRepository = new OptionRepository();
    }

    /**
     * Affiche la liste de toutes les options
     */
    public function list(): void
    {
        $options = $this->optionRepository->findAll(); // Récupère toutes les options
        $this->render('dashboard/options/list', ['options' => $options]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function add(): void
    {
        $this->render('dashboard/options/add');
    }

    /**
     * Affiche le formulaire de modification
     * @param int $id
     */
    public function edit(int $id): void
    {
        $option = $this->optionRepository->findOptionById($id);

        if (!$option) {
            throw new \Exception("Option non trouvée");
        }

        $this->render('dashboard/options/edit', ['option' => $option]);
    }

    /**
     * Traite l'ajout ou la modification d'une option
     */
    public function save(): void
    {
        $data = $_POST;
    
        // Filtrer les champs et convertir les chaînes vides en NULL
        $filteredData = [
            'category' => $data['category'] ?? null,
            'description' => $data['description'] ?? null,
            'price' => $data['price'] !== '' ? $data['price'] : null,
        ];
    
        if (isset($data['id']) && !empty($data['id'])) {
            // Mise à jour
            $success = $this->optionRepository->updateOption((int)$data['id'], $filteredData);
        } else {
            // Création
            $success = $this->optionRepository->createOption($filteredData);
        }
    
        if ($success) {
            $_SESSION['flash_success'] = "L'option a été enregistrée avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement.";
        }
    
        Redirect::to('/option/list');
    }
    
    /**
     * Supprime une option
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->optionRepository->deleteOption($id);
        Redirect::to('/option/list');
    }
}
