<?php

namespace App\Services;

use App\Repositories\SectionRepository;

class SectionService
{
    private $sectionRepo;

    public function __construct()
    {
        $this->sectionRepo = new SectionRepository();
    }

    // Ajouter une section avec image
    public function addSection(array $data)
    {
        return $this->sectionRepo->addSectionWithImage($data);
    }

    // Mettre à jour une section
    public function updateSection(int $id, array $data)
    {
        return $this->sectionRepo->updateSection($id, $data);
    }

    // Supprimer une section
    public function deleteSection(int $id)
    {
        return $this->sectionRepo->deleteSection($id);
    }
}
