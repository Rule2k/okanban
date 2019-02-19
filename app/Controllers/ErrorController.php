<?php

// Je place la classe dans le namespace
// => je place cette classe dans un sous-dossier virtuel
namespace okanban\Controllers;  // Pas de \ au début

class ErrorController extends CoreController {
    // Méthode gérant la page 404 - not found
    public function error404() {
        // On envoie un entête HTTP au navigateur
        // pour qu'il comprenne que la page n'existe pas
        // même si on lui renvoit du code HTML
        header("HTTP/1.0 404 Not Found");

        $this->show('404');
    }
}