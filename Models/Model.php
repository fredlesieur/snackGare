<?php

namespace App\Models;

use App\Config\Db;

class Model extends Db
{
    protected $table = 'test_table';
    protected $id;
    protected $name;
    protected $db;


    
    public function __construct($pdo = null)
    {
        $this->db = $pdo ?? Db::getInstance();
    }




    public function findAll()
    {
        $query = $this->req("SELECT * FROM {$this->table}");
        return $query->fetchAll();
    }




    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }

        $liste_champs = implode(' AND ', $champs);
        return $this->req('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
    }




    public function find(int $id)
    {
        return $this->req("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }




    public function create()
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        foreach ($this as $champ => $valeur) {
            if ($valeur != null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        $query = $this->req('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES(' . $liste_inter . ')', $valeurs);
        return $query->rowCount() > 0;
    }





    public function update(int $id)
{
    $champs = [];
    $valeurs = [];

    // On boucle pour éclater le tableau
    foreach ($this as $champ => $valeur) {
        if ($valeur != null && $champ != 'db' && $champ != 'table') {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
    }
    $valeurs[] = $id;

    // On transforme le tableau champ en une chaîne de caractères
    $liste_champs = implode(', ', $champs);

    // On exécute la requête
    $query = $this->req('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);

    return $query->rowCount() > 0;
}



public function delete(int $id)
{
    $query = $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    return $query->rowCount() > 0;
}



    public function req(string $sql, array $attributs = null)
    {
        if ($attributs !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            return $this->db->query($sql);
        }
    }




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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
