<?php

// Je place la classe dans le namespace
// => je place cette classe dans un sous-dossier virtuel
namespace okanban\Controllers;  // Pas de \ au début

// Import d'une classe venant d'un autre namespace
use okanban\Models\ListModel;
use okanban\Models\CardModel;
use okanban\Models\LabelModel;

class MainController extends CoreController {
    // Méthode gérant la page d'accueil
    public function home() {
        
        $this->show('home');
    }
}