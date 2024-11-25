<?php

namespace App\Controllers;

use App\Repositories\SectionRepository;

class SectionController extends Controller
{
    public function index()
    {
        $sectionRepo = new SectionRepository();
        $sections = $sectionRepo->findAll();

        $this->render('dashboard/sections/index', compact('sections'));
    }

    public function create(array $data)
    {
        $sectionRepo = new SectionRepository();
        $success = $sectionRepo->addSectionWithImage($data);

        if ($success) {
            header('Location: /dashboard/sections');
        } else {
            echo "Erreur lors de l'ajout de la section.";
        }
    }
}

