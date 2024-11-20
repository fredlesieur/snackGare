<?php
namespace App\Models;

use App\Config\Db;
use Exception;

class Model 
{
    //Table de la base de données
    protected $table;

   //Instance de DB
   protected $db;

    public function __construct()
    {
        // Obtenez l'instance de Db via getInstance
        $this->db = Db::getInstance();
    }
    public function findAll()
    {
        $query = $this->req("SELECT * FROM {$this->table}");
        return $query->fetchAll();
        
    }

public function findBy(array $criteres)
{
    $champs =[];
    $valeurs = [];

    //on boucle pour eclater le tableau
    foreach($criteres as $champ => $valeur)
    {
        // SELECT * FROM annonces WHERE id = ? and signale
        //bindValue(1, valeur)
        $champs[] = "$champ = ?";
        $valeurs[] = $valeur;
        
    }
    // on transforme le tableau champ en une chaine de caractères
    $liste_champs = implode(' AND ', $champs);
    // on exécute la requete
    return $this ->req(' SELECT * FROM ' . $this->table. ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
}

public function find(int $id)
{
    return $this->req("SELECT * FROM {$this->table} WHERE id = $id ")->fetch();
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

    // Debug : affichez la requête SQL et les valeurs
    $query = $this->req('INSERT INTO '.$this->table. ' ('. $liste_champs.') VALUES('.$liste_inter.')', $valeurs);
    if ($query) {
        echo "Requête exécutée : INSERT INTO {$this->table} ({$liste_champs}) VALUES({$liste_inter})";
        var_dump($valeurs);
    } else {
        echo "Erreur lors de l'exécution de la requête.";
    }

    return $query;
}

public function update(int $id)
{
    $champs = [];
    $valeurs = [];

    foreach ($this as $champ => $valeur) {
        if ($valeur !== null && $champ != 'db' && $champ != 'table') {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
    }

    if (empty($champs)) {
   
        throw new Exception("Aucun champ valide pour la mise à jour.");
    }

    $valeurs[] = $id;
    $listeChamps = implode(', ', $champs);


    $query = $this->req("UPDATE {$this->table} SET $listeChamps WHERE id = ?", $valeurs);
    return $query && $query->rowCount() > 0;
}






public function delete(int $id): bool
{
    $query = $this->req("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    // Vérifiez si la requête a affecté au moins une ligne
    return $query->rowCount() > 0;
}



public function req(string $sql, array $attributs = null)
{
    $this->db = Db::getInstance();

    try {
        if ($attributs !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            return $this->db->query($sql);
        }
    } catch (Exception $e) {
        echo "Erreur SQL : " . $e->getMessage();
        return false;
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




   public function uploadImage(array $file, string $directory = 'assets/images/')
   {
       // Vérifie si le fichier a bien été uploadé
       if (!isset($file['tmp_name']) || $file['error'] != 0) {
           echo "Erreur : Fichier non téléchargé ou problème lors du transfert.<br>";
           var_dump($file);  // Affiche les informations du fichier pour debug
           return false;
       }
   
       // Génère un nom unique pour l'image
       $fileName = uniqid() . '_' . basename($file['name']);
       
       // Ajuste le chemin pour ton dossier correct
       $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';

       $targetFilePath = $targetDir . $fileName;
   
       // Vérifie si le répertoire cible existe, sinon le crée
       if (!is_dir($targetDir)) {
           echo "Création du répertoire cible : " . $targetDir . "<br>";
           if (!mkdir($targetDir, 0755, true)) {
               echo "Erreur lors de la création du répertoire.<br>";
               return false;
           }
       } else {
           echo "Le répertoire existe déjà : " . $targetDir . "<br>";
       }
   
       // Déplace le fichier temporaire vers le répertoire final
       if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
           echo "Fichier déplacé avec succès vers : " . $targetFilePath . "<br>";
           return $fileName;  // Retourne le nom du fichier à enregistrer dans la base
       } else {
           echo "Erreur lors du déplacement du fichier.<br>";
           var_dump($file);
           return false;
       }
   }
   
   
   
}