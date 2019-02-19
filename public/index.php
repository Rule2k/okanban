<?php

// Inclusion des classes "Utiles"
// require __DIR__.'/../app/Utils/DBData.php';

// Inclusion des classes "Models"
// require __DIR__.'/../app/Models/CoreModel.php';
// require __DIR__.'/../app/Models/...';

// Inclusion des classes "Controllers"
// require __DIR__.'/../app/Controllers/CoreController.php';
// require __DIR__.'/../app/Controllers/ErrorController.php';
// require __DIR__.'/../app/Controllers/MainController.php';
// require __DIR__.'/../app/Controllers/...';

// Inclusion de la classe Application
// require __DIR__.'/../app/Application.php';

// Inclusion des dépendances de Composer
require __DIR__.'/../vendor/autoload.php';

// Autoload via Composer
// norme PSR-4 : https://www.php-fig.org/psr/psr-4/
// utilisation des namespaces
// 1 namespace est un dossier virtuel contenant des classes
// PSR-4 => namespace doit correspond aux dossiers physiques

// Exemple pour $$
// ----------------------
// $toto = 'tata';
// $tata = 'Victoire';
// $Victoire = 'Défaite';
// // $$toto = $($toto) = $('tata') = $tata = 'victoire'
// echo $$toto; // => $toto = 'tata' => $'tata' => $tata
// echo '<br>';
// echo $$$toto;
// echo '<br>';

// J'instancie la classe Application (FrontController)
// okanban => répertoire app
// \ car séparateur de dossier des namespaces
// Application => Application.php
// Au final, php comprend qu'il doit charger le fichier app/Application.php
$app = new okanban\Application();
$app->run();

// echo 'frontcontroller';exit;
// die('front controller');