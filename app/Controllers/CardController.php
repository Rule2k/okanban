<?php

// Je place la classe dans le namespace
// => je place cette classe dans un sous-dossier virtuel
namespace okanban\Controllers;  // Pas de \ au début

// Import d'une classe venant d'un autre namespace
use okanban\Models\CardModel;

class CardController extends CoreController {
    // Méthode gérant la page d'accueil



    public function getCardsFromList($urlParams) {
        $cards = CardModel::findByListId($urlParams['id']);
        $this->showJson($cards);

    }

    public function add($urlParams) {
        $listId = $urlParams['id'];

        $cardName = isset($_POST['cardName']) ? trim($_POST['cardName']) : '';

        $cardModel = new CardModel();
        $cardModel->setTitle($cardName);
        $cardModel->setListOrder(99);
        $cardModel->setListId($listId);

        $saveOk = $cardModel->save();

        if ($saveOk) {
            $this->showJson($cardModel);
        }
        else {
            echo 'TODO';
        
        }
        }

        public function update($urlParams) {
            $cardId = $urlParams['id'];
    
            // Récupération les données en POST
            $cardName = isset($_POST['cardName']) ? trim($_POST['cardName']) : '';
            $listOrder = isset($_POST['listOrder']) ? trim($_POST['listOrder']) : 99;
            $listId = isset($_POST['listId']) ? trim($_POST['listId']) : 0;
    
            if (!empty($cardName)) {
                // Pour effectuer un update, je dois d'abord récupérer un cardModel sur cet id
                $cardModel = CardModel::find($cardId);
                $cardModel->setTitle($cardName);
                $cardModel->setListOrder($listOrder);
                $cardModel->setListId($listId);
                // J'exécute l'update
                $saveOk = $cardModel->save();
    
                if ($saveOk) {
                    // J'affiche le model sauvegardé au format JSON
                    $this->showJson($cardModel);
                }
                else {
                    echo 'TODO';
                }
            }
            else {
                echo 'TODO';
            }
        }
}