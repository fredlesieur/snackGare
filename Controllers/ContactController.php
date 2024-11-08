<?php

namespace App\Controllers;
use App\Config\CloudinaryService;
use App\Models\ContactModel;

class ContactController extends Controller
{
 
    public function index()
    {
        // Appelle la méthode render pour afficher la vue "contact"
        $this->render('contact/index');
    }
   
    public function createContact()
    {
        $ContactModel = new ContactModel();
        $cloudinaryService = new CloudinaryService();
        $contact = $ContactModel->findAll();

        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = $_FILES['image'];
            $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
            if ($fileUrl) {
                $image = $fileUrl;
                if ($ContactModel->createContact($image)) {
                    $_SESSION['success'] = "Le contact a été créé avec succès.";
                    header("Location: /");
                    exit();
                } else {
                    $error = "Erreur lors de l'ajout du contact.";
                }
            } else {
                $error = "Erreur lors de l'upload de l'image.";
            } 

    }

    $title = "Créer un Contact";
    $this->render('/', compact('contact'));
}

}