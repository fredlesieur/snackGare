<?php

namespace App\Controllers;

use App\Repositories\OffreRepository;
use Exception;
use App\Utils\Redirect;


class OffreController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        try {
            // Utiliser la classe MongoDb pour la connexion à MongoDB
            $mongo = new OffreRepository();
            $offres = $mongo->findAll();

        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage() . "<br>";
            echo "Trace de l'erreur : " . $e->getTraceAsString();
        }

        $css = '/assets/css/offre.css';
        $this->render("offres/index", compact('offres','css'));
    }


    public function show(): void
    {
        $this->render('dashboard/offres/add');
    }


    // Fonction pour ajouter une offre
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
               
                $mongo = new OffreRepository();

                // Créer un nouvel horaire
                $name = $_POST['name'];
                $description = $_POST['description'];
                $tarif = $_POST['tarif'];

                $mongo->add_offre($name, $description, $tarif);
                $_SESSION['success'] = "L'offre a été ajouté avec succès.";
                Redirect::to('/offre/list');
                exit();
            } catch (Exception $e) {
                echo "Erreur MongoDB : " . $e->getMessage();
            }
        }

      
        $this->render('dashboard/offres/add');
    }




    public function edit($id)
    {
        $mongo = new OffreRepository();
        $offre = $mongo->find($id);
        
        if ($offre === null) {
            $_SESSION['error'] = "Aucune offre trouvée avec cet ID.";
            Redirect::to('/offre/list');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {

                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $tarif = $_POST['tarif'];

                $mongo->edit_offre($id, $name, $description, $tarif);
                $_SESSION['success'] = "L'offre a été modifiée avec succès.";
                Redirect::to('/offre/list');
                exit();
            } catch (Exception $e) {
                echo "Erreur MongoDB : " . $e->getMessage();
            }

        }
        $this->render('dashboard/offres/edit', compact('offre'));
    }


    // Fonction pour lister les horaires
    public function list() {
        try {
            $mongo = new OffreRepository();
            $offres = $mongo->findAll();
            
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
            return;
        }
        $_SESSION['success'] = "L'offre a été modifiée avec succès.";
        $this->render('dashboard/offres/list', compact('offres'));
    }

 
    public function delete($_id) {
  
    
            // Utilise la classe MongoDb pour la connexion à MongoDB
            $mongo = new OffreRepository();
            
            // Supprime l'offre correspondant à l'ID
            $mongo->delete_offre($_id);
            
            $_SESSION['success'] = "L'offre a été supprimée avec succès.";
            Redirect::to('/offre/list');  // Redirige vers le tableau de bord ou la liste
            exit();   
}
}