<?php

namespace App\Repositories;

use App\Config\MongoDb;;
use MongoDB\BSON\ObjectId;

class OffreRepository extends MongoDb {

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
                'root' => 'array',  // Return documents as objects
                'document' => 'array'
            ]
        ];
        return $this->collection->findOne(['_id' => new ObjectId($id)]);
    }

    public function add_offre($name, $description, $tarif)
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'tarif' => $tarif
        ];
        $this->collection->insertOne($data);
    }

    public function edit_offre($id, $name, $description, $tarif)
    {
        $filter = ['_id' => new ObjectId($id)];
        $update = [
            '$set' => [
            'name' => $name,
            'description' => $description,
            'tarif' => $tarif
            ]
        ];
        $this->collection->updateOne($filter, $update);
    }
    public function delete_offre($id)
    {
        $filter = ['_id' => new ObjectId($id)];
        $this->collection->deleteOne($filter);
    }
}
