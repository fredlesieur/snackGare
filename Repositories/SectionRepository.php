<?php

namespace App\Repositories;

use App\Services\CloudinaryService;

class SectionRepository extends BaseRepository
{
    protected $table = 'sections';


    


    private $imageRepository;

    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
        parent::__construct(); // Appelle le constructeur de BaseRepository
    }

    public function addSectionWithImage(array $data): bool
    {
        return $this->create($data);
    }
    
    public function findByPageId(int $pageId)
    {
        // Remplacez ceci par la logique de récupération des données
        // Exemple avec PDO ou autre ORM :
        // return $this->db->query('SELECT * FROM sections WHERE page_id = ?', [$pageId]);
        return []; // Exemple : retourne un tableau vide pour le test.
    }

    // Récupérer l'URL de l'image par son ID
    public function getImageUrlById(int $imageId): ?string
    {
        $sql = "SELECT url FROM images WHERE id = :id";
        $stmt = $this->req($sql, ['id' => $imageId]);
        $result = $stmt->fetch();
        
        return $result ? $result['url'] : null; // Retourne l'URL de l'image ou null si aucune image n'est trouvée
    }

    // Créer une section dans la base de données
    public function createSection(array $data): bool
    {
        return $this->create($data);  // Utilise la méthode create héritée de BaseRepository
    }

    // Récupérer une section par son ID
    public function findById(int $id): ?array
    {
        return $this->find($id);
    }

    // Mettre à jour une section
    public function updateSection(int $id, array $data): bool
    {
        // Appelle la méthode générique `update()` de BaseRepository
        return parent::update($id, $data);
    }
    // Supprimer une section
    public function deleteSection(int $id): bool
    {
        $section = $this->findById($id);
        
        if (!$section) {
            return false;  // Si la section n'existe pas
        }

        // Si l'image est associée à la section, on la supprime
        if (isset($section['image_id'])) {
            $imageRepository = new ImageRepository();
            $imageRepository->deleteImage($section['image_id']);
        }

        return $this->delete($id);  // Supprimer la section
    }
}

    