<?php

namespace okanban\Models;
use PDO;
use okanban\Utils\Database;

// ListModel pour la table list
class LabelModel extends CoreModel {
    // 1 propriété pour chaque champ de la table
    private $name;
    const TABLE_NAME = 'label';

    public static function find($id) {
        // TODO
    }

    public function insert() {

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
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }

    public function jsonSerialize() {
        // Ce tableau retournée sera convertit en JSON par la fonction json_encode
        // lorsque que j'appelle : json_encode($labelModel);
        // où $labelModel est un objet de la classe LabelModel
        return [
            'id' => $this->id,
            'name' => $this->name,
            // je choisis de ne pas y placer created_at et updated_at
        ];
    }
}