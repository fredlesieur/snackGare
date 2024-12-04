<?php

namespace App\Repositories;

use App\Config\MongoDb;;
use MongoDB\BSON\ObjectId;

class OffreRepository extends MongoDb 
{

    private $collection;

    public function __construct() {
        parent::__construct(); 
        $this->collection = $this->getCollection('snack_gare', 'en_ce_moment');
    }

    public function findAll()
    {
        $options = [
            'typeMap' => [
                'root' => 'array',  // Return documents as objects
                'document' => 'array'
            ]
        ];
        return $this->collection->find([], $options)->toArray();
    }

    public function find($id)
{
  
    $options = [
        'typeMap' => [
            'root' => 'array',  // Retourner le document sous forme de tableau (pas un objet)
            'document' => 'array'
        ]
    ];
    
    $document = $this->collection->findOne(['_id' => new ObjectId($id)], $options);
    
    if ($document === null) {
        throw new \Exception('Aucun document trouvé avec cet ID.');
    }

    return $document;
}

    

    public function add_offre($name, $description, $tarif)
{
    try {
        $data = [
            'name' => $name,
            'description' => $description,
            'tarif' => $tarif
        ];
        $this->collection->insertOne($data);
        
    } catch (\Exception $e) {
        // Log or handle the error
        throw new \Exception('Erreur lors de l\'ajout de l\'offre : ' . $e->getMessage());
    }
}

public function edit_offre($id, $name, $description, $tarif)
{
    
    try {
        $filter = ['_id' => new ObjectId($id)];
        $update = [
            '$set' => [
                'name' => $name,
                'description' => $description,
                'tarif' => $tarif
            ]
        ];
        $result = $this->collection->updateOne($filter, $update);
        
        if ($result->getModifiedCount() === 0) {
            throw new \Exception("Aucune modification effectuée, vérifiez l'ID ou les données.");
        }
    } catch (\Exception $e) {
        // Log or handle the error
        throw new \Exception('Erreur lors de la modification de l\'offre : ' . $e->getMessage());
    }
}

public function delete_offre($id)
{
    try {
        $filter = ['_id' => new ObjectId($id)];
        $result = $this->collection->deleteOne($filter);
        
        if ($result->getDeletedCount() === 0) {
            throw new \Exception("Aucune offre trouvée à supprimer avec cet ID.");
        }
    } catch (\Exception $e) {
        // Log or handle the error
        throw new \Exception('Erreur lors de la suppression de l\'offre : ' . $e->getMessage());
    }
}

}
