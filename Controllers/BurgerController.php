<?php

namespace App\Controllers;

use App\Services\BurgerService;
use App\Utils\Redirect;

class BurgerController extends Controller
{
    private $burgerService;

    public function __construct()
    {
        // Instancier le service au lieu du repository
        $this->burgerService = new BurgerService();
    }

    /**
     * Affiche la liste des burgers
     */
    public function list(): void
    {
        // Appeler le service pour récupérer les burgers
        $burgers = $this->burgerService->getAllBurgers();
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
        // Appeler le service pour récupérer le burger à modifier
        $burger = $this->burgerService->getBurgerById($id);

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

        // Vérifier si c'est une création ou une mise à jour
        if (isset($data['id']) && !empty($data['id'])) {
            // Mise à jour d'un burger existant via le service
            $success = $this->burgerService->updateBurger((int)$data['id'], $filteredData);
        } else {
            // Création d'un nouveau burger via le service
            $success = $this->burgerService->createBurger($filteredData);
        }

        // Messages flash pour le retour utilisateur
        if ($success) {
            $_SESSION['flash_success'] = "Le burger a été enregistré avec succès.";
        } else {
            $_SESSION['flash_error'] = "Une erreur s'est produite lors de l'enregistrement du burger.";
        }

        // Redirection vers la liste des burgers
        Redirect::to('/burger/list');
    }

    /**
     * Supprime un burger
     * @param int $id
     */
    public function delete(int $id): void
    {
        // Appeler le service pour supprimer le burger
        $this->burgerService->deleteBurger($id);
        Redirect::to('/burger/list');
    }
}
