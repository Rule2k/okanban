<?php

namespace okanban\Models;
use PDO;
use okanban\Utils\Database;
// ListModel pour la table list
class CardModel extends CoreModel {
    // 1 propriété pour chaque champ de la table
    private $title;
    private $list_order;
    private $list_id;
    const TABLE_NAME = 'card';

    // Je crée une constante contenant le nom de la table
    // variable no variable => sa valeur ne peut pas changer
    // une constante n'a pas de visilibité, elle est toujours "public"
    // Convention de nommage : une constante est écrite en majuscules, espaces symbolisés par _
    
    public static function findByListId($id) {
        
        $sql = '
            SELECT *
            FROM '.static::TABLE_NAME.'
            WHERE list_id = :id
            ORDER BY list_order ASC';
            
        $pdoStatement = Database::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public function insert() {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (`title`, `list_order`, `list_id`) VALUES (:title, :list_order, :list_id)';
        $pdoStatement = Database::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':list_order', $this->list_order, PDO::PARAM_INT);
        $pdoStatement->bindValue(':list_id', $this->list_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $insertedRows = $pdoStatement->rowCount();
        return $insertedRows == 1;
    }

    public static function find($id) {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = :cardid';
        $pdoStatement = Database::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':cardid', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement->fetchObject(self::class);
    }

    public function update() {
        // Je définis les tokens/jetons/marqueurs
        $sql = '
            UPDATE ' . self::TABLE_NAME . '
            SET title = :title,
            list_order = :listOrder,
            list_id = :listId,
            updated_at = NOW()
            WHERE id = :id
        ';
        $pdoStatement = Database::getPDO()->prepare($sql);
        // Je définis une valeur pour chaque token
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':listOrder', $this->list_order, PDO::PARAM_INT);
        $pdoStatement->bindValue(':listId', $this->list_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        // J'exécute la requête
        $pdoStatement->execute();

        // Je récupère le nombre de lignes insérées
        $updatedRows = $pdoStatement->rowCount();

        // Je retourne vrai si 1 ligne insérée
        return ($updatedRows == 1);
    }

    public function delete() {
        $sql = 'DELETE FROM ' . self::TABLE_NAME . ' WHERE id = :id';
        $pdoStatement = Database::getPDO()->prepare($sql);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $deletedRows = $pdoStatement->rowCount();
        // Je retourne vrai si le nombre de lignes supprimées est égal à 1
        return ($deletedRows == 1);
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;
        return $title;
    }

    /**
     * Get the value of list_order
     */ 
    public function getListOrder()
    {
        return $this->list_order;
    }

    /**
     * Set the value of list_order
     *
     * @return  self
     */ 
    public function setListOrder($list_order)
    {
        $this->list_order = $list_order;
        return $list_order;
    }

    /**
     * Get the value of list_id
     */ 
    public function getListId()
    {
        return $this->list_id;
    }

    /**
     * Set the value of list_id
     *
     * @return  self
     */ 
    public function setListId($list_id)
    {
        $this->list_id = $list_id;
        return $list_id;
    }
    
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'list_order' => $this->list_order,
            'list_id' => $this->list_id
            // Je ne transmets pas created_at et updated_at à Ajax, car inutile
        ];
    }
}

// Quand je crée un méthode dans DBData
    /*
    1 - déclarer la méthode
    2 - écrire la requête SQL dans une variable de type String
    3 - sur le connecteur (objet PDO) exécute la méthode query avec la requête en paramètre
    4 - 2 cas de figure :
        4-a) 1 seul résultat => $pdoStatement->fetch ou $pdoStatement->fetchObject
        4-b) plusieurs résultats => $pdoStatement->fetchAll
    5 - Retour en Objet ou Tableau :
        5-a) requête sur 1 seule table :
            5-a-i) 1 seul résultat => fetchObject(le Model correspondant)
            5-a-ii) plusieurs résultats => fetchAll(PDO::FETCH_CLASS, le Model correspondant)
        5-b) requête sur plusieurs tables => PDO::FETCH_ASSOC
    6 - retourner le tableau
    */