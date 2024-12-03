<?php

namespace App\Controllers;

use App\Repository\OffreRepository;
use Exception;
use App\Utils\Redirect;

class OffreController extends Controller
{ 

    public function index() {
        try {
            // Utiliser la classe MongoDb pour la connexion à MongoDB
            $mongo = new OffreRepository();
            $offres = $mongo->findAll();

        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage() . "<br>";
            echo "Trace de l'erreur : " . $e->getTraceAsString();
        }

        

        $this->render("offres/index", compact("offres"));
    }
    public function show(): void
    {
        $this->render('dashboard/offre/add');
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
                Redirect::to('/dashboard/index');
                exit();
            } catch (Exception $e) {
                echo "Erreur MongoDB : " . $e->getMessage();
            }
        }

      
        $this->render('dashboard/offres/add');
    }


   // Fonction pour modifier un horaire
public function edit($id) {

    $mongo = new OffreRepository();

    // Récupérer l'offre à modifier (ceci renvoie un document BSON)
    $offre = $mongo->find($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Récupérer les données du formulaire
            $id = $_POST['id'];  // ID envoyé via un champ caché
            $name = $_POST['name'];
            $description = $_POST['description'];
            $tarif = $_POST['tarif'];

            // Utiliser le modèle pour mettre à jour l'offre(ne pas appeler edit_offre sur le document)
            $mongo->edit_offre($id, $name, $description, $tarif);  // Appeler sur l'objet modèle $mongo
            $_SESSION['success'] = "L'offre a été mis à jour avec succès.";
            Redirect::to('/dashboard/index');
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

        $this->render('dashboard/offres/list', compact('offres'));
    }

 
    public function delete($id) {
        try {
            // Utilise la classe MongoDb pour la connexion à MongoDB
            $mongo = new OffreRepository();
            
            // Supprime l'offre correspondant à l'ID
            $mongo->delete_offre($id);
            
            $_SESSION['success'] = "L'offre a été supprimé avec succès.";
            Redirect::to('/dashboard/index');
            exit();
        } catch (Exception $e) {
            echo "Erreur MongoDB : " . $e->getMessage();
        }
    }

}