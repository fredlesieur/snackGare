<?php

namespace App\Controllers;

use App\Repositories\BurgerRepository;
use App\Utils\Redirect;

class BurgerController extends Controller
{
    private $burgerRepository;

    public function __construct()
    {
        $this->burgerRepository = new BurgerRepository();
    }

    /**
     * Affiche la liste des burgers
     */
    public function list(): void
    {
        $burgers = $this->burgerRepository->findAllBurgers();
        $this->render('dashboard/burgers/list', ['burgers' => $burgers]);
    }

    /**
     * Affiche le formulaire d'ajout
     */
    public function add(): void
    {
        $this->render('dashboard/burgers/add', []);
    }

    /**
     * Affiche le formulaire de modification
     * @param int $id
     */
    public function edit(int $id): void
    {
        $burger = $this->burgerRepository->findBurgerById($id);

        if (!$burger) {
            throw new \Exception("Burger non trouvé");
        }

        $this->render('dashboard/burgers/edit', ['burger' => $burger]);
    }

    /**
     * Traite l'ajout ou la modification d'un burger
     */
    public function save(): void
    {
        $data = $_POST;
    
        // Filtrer les champs pour ne conserver que ceux de la table
        $filteredData = [
            'name' => $data['name'] ?? null,
            'description' => $data['description'] ?? null,
            'price' => $data['price'] ?? null,
            'price_menu' => $data['price_menu'] ?? null,
        ];
    
        if (isset($data['id']) && !empty($data['id'])) {
            // Mise à jour d'un burger existant
            $success = $this->burgerRepository->updateBurger((int)$data['id'], $filteredData);
        } else {
            // Création d'un nouveau burger
            $success = $this->burgerRepository->createBurger($filteredData);
        }
    
        // Messages flash pour le retour utilisateur
        if ($success) {
            $_SESSION['flash_success'] = "Le burger a été enregistré avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement du burger.";
        }
    
        Redirect::to('/burger/list');
    }
    /**
     * Supprime un burger
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->burgerRepository->deleteBurger($id);
        Redirect::to('/burger/list');
    }
}


