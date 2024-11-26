<?php

namespace App\Controllers;

use App\Repositories\ImageRepository;
use App\Repositories\SectionRepository;
use App\Services\CloudinaryService;
use App\Utils\Redirect;

class SectionController extends Controller
{
    protected $table = 'images';

    public function __construct()
    {
        parent::__construct();
        echo "SectionController est bien instancié"; // Affiche ce message lors de l'instanciation
    }

    // Affiche la liste des sections
    public function list()
    {
        $sectionRepo = new SectionRepository();
        $sections = $sectionRepo->findAll();  // Récupérer toutes les sections
        
        // Ajouter l'URL de l'image pour chaque section
        foreach ($sections as &$section) {
            if (!empty($section['image_id'])) {
                $imageRepo = new ImageRepository();
                $section['image_url'] = $imageRepo->getImageUrlById($section['image_id']);  // Récupérer l'URL de l'image
            } else {
                $section['image_url'] = null;
            }
        }
    
        // Passer les données à la vue
        $this->render('dashboard/section/list', compact('sections'), true);
    }

    // Affiche le formulaire d'ajout d'une section
    public function showAddForm()
    {
        $this->render('dashboard/section/add', ['title' => 'Ajouter une section'], true);  // Formulaire d'ajout
    }
    public function add()
    {
        $cloudinaryService = new CloudinaryService();
        $error = null;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $content = $_POST['content'] ?? null;
            $pageId = $_POST['page_id'] ?? null;
            $displayOrder = $_POST['display_order'] ?? null;
    
            if (empty($title) || empty($content) || empty($pageId)) {
                $error = "Les champs titre, contenu et page sont obligatoires.";
            } else {
                $imageId = null;
    
                if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                    $imagePath = $_FILES['image_url']['tmp_name'];
                    $uploadedUrl = $cloudinaryService->uploadFile($imagePath, 'sections/');
    
                    if ($uploadedUrl) {
                        $imageRepo = new ImageRepository(); // Le repository gère lui-même $table
                        $imageId = $imageRepo->addImage($uploadedUrl, $title);
                    } else {
                        $error = "Erreur lors de l'upload de l'image.";
                    }
                }
    
                if (!$error) {
                    $data = [
                        'title' => $title,
                        'content' => $content,
                        'image_id' => $imageId,
                        'page_id' => $pageId,
                        'display_order' => $displayOrder,
                    ];
    
                    $sectionRepo = new SectionRepository();
                    if ($sectionRepo->addSectionWithImage($data)) {
                        $_SESSION['success'] = "Section ajoutée avec succès.";
                        Redirect::to('/section/list');
                    } else {
                        $error = "Erreur lors de l'ajout de la section.";
                    }
                }
            }
        }
    
        $this->render('dashboard/section/add', compact('error'), true);
    }


    // La méthode create attend $data comme argument
    public function create(array $data)
    {
        $sectionRepo = new SectionRepository();
        if ($sectionRepo->addSectionWithImage($data)) {
            $_SESSION['success'] = "Section ajoutée avec succès.";
            Redirect::to('/section/list');  // Redirection vers la liste des sections
        } else {
            $_SESSION['error'] = "Erreur lors de l'ajout de la section.";
            Redirect::to('/section/list');  // Redirection vers la liste des sections en cas d'erreur
        }
    }
    // Affiche le formulaire de modification d'une section existante
    public function showEditForm(int $id)
    {
        $sectionRepo = new SectionRepository();
        $section = $sectionRepo->find($id);
    
        if (!$section) {
            $_SESSION['error'] = "Section introuvable.";
            Redirect::to('/section/list'); // Redirige vers la liste des sections si l'ID est invalide
            return;
        }
    
        // Affiche le formulaire avec les données existantes de la section
        $this->render('dashboard/section/edit', ['section' => $section], true);
    }
    
    public function edit(int $id)
    {
        $sectionRepo = new SectionRepository();
        $section = $sectionRepo->find($id); // Recherche la section par ID
    
        if (!$section) {
            $_SESSION['error'] = "Section introuvable.";
            Redirect::to('/section/list'); // Redirige vers la liste si l'ID est invalide
            return;
        }
    
        // Affiche le formulaire d'édition avec les données existantes de la section
        $this->render('dashboard/section/edit', ['section' => $section], true);
    }
    // Met à jour une section
    public function update(int $id)
    {
        $cloudinaryService = new CloudinaryService();
        $error = null;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation des champs
            $title = $_POST['title'] ?? null;
            $content = $_POST['content'] ?? null;
            $pageId = $_POST['page_id'] ?? null;
            $displayOrder = $_POST['display_order'] ?? null;
    
            if (empty($title) || empty($content) || empty($pageId)) {
                $error = "Les champs titre, contenu et page sont obligatoires.";
            } else {
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'page_id' => $pageId,
                    'display_order' => $displayOrder,
                ];
    
                // Gestion de l'image si présente
                if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
                    $imagePath = $_FILES['image_url']['tmp_name'];
                    $uploadedUrl = $cloudinaryService->uploadFile($imagePath, 'sections/');
    
                    if ($uploadedUrl) {
                        $imageRepo = new ImageRepository(); // Aucun besoin de manipuler `$table` ici
                        $imageId = $imageRepo->addImage($uploadedUrl, $title);
                        $data['image_id'] = $imageId; // Ajoute l'ID de la nouvelle image
                    } else {
                        $error = "Erreur lors de l'upload de l'image.";
                    }
                }
    
                if (!$error) {
                    $sectionRepo = new SectionRepository();
                    if ($sectionRepo->updateSection($id, $data)) { // Appelle `updateSection`
                        $_SESSION['success'] = "Section mise à jour avec succès.";
                        Redirect::to('/section/list');
                    } else {
                        $error = "Erreur lors de la mise à jour de la section.";
                    }
                }
            }
        }
    
        // Réaffiche le formulaire avec l'erreur si nécessaire
        $sectionRepo = new SectionRepository();
        $section = $sectionRepo->find($id);
    
        $this->render('dashboard/section/edit', compact('section', 'error'), true);
    }
    

    // Supprimer une section
    public function delete(int $id)
    {
        $sectionRepo = new SectionRepository();
        $success = $sectionRepo->deleteSection($id);

        if ($success) {
            $_SESSION['success'] = "Section supprimée avec succès.";
        } else {
            $_SESSION['error'] = "Erreur lors de la suppression de la section.";
        }

        Redirect::to('/section/list');
    }
}
