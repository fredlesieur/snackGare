<?php

namespace App\Controllers;

use App\Services\CloudinaryService;
use App\Models\ContactModel;

class ContactController extends Controller
{
    /**
     * Affiche la page de contact principale.
     */
    public function index()
    {
        $this->render('contact/index');
    }

    /**
     * Affiche le formulaire d'ajout de contact dans le dashboard.
     */
    public function showAddContact()
    {
        $this->render('dashboard/add_contact');
    }

    /**
     * Ajoute un contact avec upload d'image via Cloudinary.
     */
    public function addContact()
    {
        $contactModel = new ContactModel();
        $cloudinaryService = new CloudinaryService();
        $error = null;

        // Vérifiez que la requête est de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifiez si un fichier image est fourni et valide
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imagePath = $_FILES['image']['tmp_name'];

                // Téléchargez l'image sur Cloudinary
                $uploadedUrl = $cloudinaryService->uploadFile($imagePath, 'contacts/');

                if ($uploadedUrl) {
                    // Ajout dans la base de données
                    var_dump($uploadedUrl);
                    if ($contactModel->createContact($uploadedUrl)) {
                        $_SESSION['success'] = "Le contact a été créé avec succès.";
                        header("Location: /dashboard/index");
                        exit();
                    } else {
                        $error = "Erreur lors de l'ajout du contact en base de données.";
                    }
                } else {
                    $error = "Erreur lors de l'upload de l'image sur Cloudinary.";
                }
            } else {
                $error = "Aucune image valide téléchargée.";
            }
        }

        // En cas d'erreur, recharge la vue avec le message d'erreur
        $this->render('dashboard/add_contact', compact('error'));
    }

    /**
     * Teste la connexion à la base de données.
     */
    public function testConnection()
    {
        $db = \App\Config\Db::getInstance();
        if ($db) {
            echo "Connexion à la base de données réussie.";
        } else {
            echo "Échec de la connexion à la base de données.";
        }
    }
}
