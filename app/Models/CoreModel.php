<?php

// Je place la classe dans le namespace
// => je place cette classe dans un sous-dossier virtuel
namespace okanban\Models;  // Pas de \ au début

use okanban\Utils\Database;
use PDO;

// Classe parente de tous nos Models
// elle regroupe les propriétés et méthodes communes
// abstract permet d'interdir toute instanciation de la classe, très utile notamment pour les parents qui servent uniquement à factoriser

abstract class CoreModel implements \JsonSerializable {

    protected $id;
    protected $created_at;
    protected $updated_at;

    public abstract static function find($id); // oblige les enfants a coder cette méthode
    public abstract function insert(); // oblige les enfants a coder cette méthode
    public abstract function update(); // oblige les enfants a coder cette méthode
    public abstract function delete(); // oblige les enfants a coder cette méthode



    // nous permet d'insérer ou update, en fonction de si nous avons un ID ou pas. Si ID : c'est une update, si aucun ID n'est fourni alors c'est une insertion.
    public function save() {

        if($this->id > 0) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    // Méthode "static" car n'a pas besoin de l'instance courante ($this)
    // => elle est liée à la classe
    // => pour l'appeler CardModel::findAll() ou LabelModel::findAll()

    public static function findAll($orderBy='') {
        // Aucune "variable" dans la requête => pas besoin de prepare
        $sql = '
            SELECT *
            FROM '.static::TABLE_NAME;
        if (!empty($orderBy)) {
            $sql .= '
                ORDER BY '.$orderBy;
        }
        $pdoStatement = Database::getPDO()->query($sql);
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}