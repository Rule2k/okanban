<?php

// Je place la classe dans le namespace
// => je place cette classe dans un sous-dossier virtuel
namespace okanban\Controllers;  // Pas de \ au début

// Import d'une classe venant d'un autre namespace
use okanban\Models\ListModel;
use okanban\Models\CardModel;
use okanban\Models\LabelModel;

class ListController extends CoreController {
    // Méthode gérant la page d'accueil

    public function add() {
        $listModel = new ListModel();
        $listModel->setName($_POST['listName']);
        $listModel->setPageOrder('255');
        $listModel->insert();
        $this->showJson($listModel);
    }

    public function list() {
        $lists = ListModel::findAll('page_order ASC');
        $this->showJson($lists);
    }
}