<?php

namespace okanban\Models;
use PDO;
use okanban\Utils\Database;

// ListModel pour la table list
class ListModel extends CoreModel {
    // 1 propriété pour chaque champ de la table
    private $name;
    private $page_order;
    const TABLE_NAME = 'list';

    public function insert() {
        $sql = '
            INSERT INTO list (name, page_order) VALUES (:name, :pageOrder)
        ';
        $pdoStatement = Database::getPDO()->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':pageOrder', $this->page_order, PDO::PARAM_INT);

        $pdoStatement->execute();

        $insertedRows = $pdoStatement->rowCount();

        // On récupère l'id généré par MySQL
        $this->id = Database::getPDO()->lastInsertId();

        return ($insertedRows > 0);
    }

    public static function find($id) {
        // TODO
    }

    public function update() {

    }

    public function delete() {
        
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of page_order
     */ 
    public function getPageOrder()
    {
        return $this->page_order;
    }

    /**
     * Set the value of page_order
     */ 
    public function setPageOrder($page_order)
    {
        $this->page_order = $page_order;
    }

    public function jsonSerialize() {
        // Ce tableau retournée sera convertit en JSON par la fonction json_encode
        // lorsque que j'appelle : json_encode($listModel);
        // où $listModel est un objet de la classe ListModel
        return [
            'id' => $this->id,
            'name' => $this->name,
            'page_order' => $this->page_order,
            // je choisis de ne pas y placer created_at et updated_at
        ];
    }

}