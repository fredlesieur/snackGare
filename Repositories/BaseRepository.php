<?php

namespace App\Repositories;

use App\Config\Db;

class BaseRepository
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    protected function ensureTableIsSet(): void
    {
        if (empty($this->table)) {
            throw new \Exception("La propriété \$table n'est pas définie dans le repository.");
        }
    }
    // Méthode pour exécuter une requête avec ou sans paramètres
    protected function req(string $sql, array $attributs = null)
    {
        $this->ensureTableIsSet(); // Vérifie que $table est défini
    
        try {
            if ($attributs !== null) {
                $query = $this->db->prepare($sql);
                $query->execute($attributs);
                return $query;
            } else {
                return $this->db->query($sql);
            }
        } catch (\Exception $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return false;
        }
    }
    

    // Méthode pour hydrater un objet avec un tableau de données
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
        return $this;
    }

    public function findAll()
    {
        $query = $this->req("SELECT * FROM {$this->table}");
        return $query ? $query->fetchAll() : [];
    }

    public function find(int $id): array | false
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $query = $this->req($sql, [$id]);
        return $query->fetch() ?: false;
    }
    

    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];
        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
        $listeChamps = implode(' AND ', $champs);
        $query = $this->req("SELECT * FROM {$this->table} WHERE $listeChamps", $valeurs);
        return $query ? $query->fetchAll() : [];
    }

    public function create(array $data): bool
    {
        $champs = array_keys($data);
        $valeurs = array_values($data);
        $listeChamps = implode(', ', $champs);
        $placeholders = implode(', ', array_fill(0, count($champs), '?'));
    
        $query = $this->req("INSERT INTO {$this->table} ($listeChamps) VALUES ($placeholders)", $valeurs);
    
        // Retourne true si la requête a été exécutée avec succès
        return $query && $query->rowCount() > 0;
    }
    
    public function update(int $id, array $data): bool
    {
        $fields = [];
        $values = [];
    
        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $values[] = $value;
        }
    
        $values[] = $id; // Ajoute l'ID à la fin pour la clause WHERE
    
        $fieldsList = implode(', ', $fields);
        $sql = "UPDATE {$this->table} SET {$fieldsList} WHERE id = ?";
    
        $query = $this->req($sql, $values);
    
        // Retourne `true` si la requête a affecté au moins une ligne
        return $query && $query->rowCount() > 0;
    }
    public function delete(int $id): bool
{
    $sql = "DELETE FROM {$this->table} WHERE id = ?";
    $query = $this->req($sql, [$id]);

    // Retourne true si la suppression affecte au moins une ligne
    return $query && $query->rowCount() > 0;
}

}
