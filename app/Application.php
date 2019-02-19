<?php

// Je place la classe dans le namespace
// => je place cette classe dans un sous-dossier virtuel
namespace okanban;

class Application {
    /** @var Altorouter */
    private $router;

    public function __construct()
    {
        // session_start();

        // J'instancie l'objet s'occupant du routage
        // \AltoRouter =>
        //    \ pour repartir du niveau 0 (racine)
        //    Altorouter car la classe ne se trouve pas dans le "dossier" okanban
        $this->router = new \AltoRouter();
        // Je configure le basePath
        if ($_SERVER['HTTP_HOST'] != 'api.okanban.local') {
            // Alors on récupère le BASE_URI pour définir le BasePath
            // Sinon, ce n'est pas utile
            // Récuperation de la BASE_URI mise en place via le .htaccess
            $baseUrl = isset($_SERVER['BASE_URI']) ? trim($_SERVER['BASE_URI']) : '/';
            // Définition de la BASE_URI à AltoRouteur
            $this->router->setBasePath($baseUrl);
            }        // J'appelle la méthode s'occupant de créer les routes
        $this->mapRoutes();
    }

    // Méthode permettant de mapper toutes les routes du projet
    public function mapRoutes() {
        // Je déclare la route pour la home
        // ->map parameters:
        //    - GET => method HTTP
        //    - '/' => pattern d'URL => URL de la page
        //    - 'MainController#home' => string contenant le nom du Controller puis # puis le nom de la méthode pour cette page
        //    - 'home' => le nom de cette route
        $this->router->map('GET', '/', 'MainController#home', 'home');
        $this->router->map('POST', '/lists/add', 'ListController#add', 'list_add');
        $this->router->map('GET', '/lists', 'ListController#list', 'list_list');
        $this->router->map('GET', '/lists/[i:id]/cards', 'CardController#getCardsFromList', 'card_getcardsfromlist');
        $this->router->map('POST', '/lists/[i:id]/cards/add', 'CardController#add', 'card_add');
        $this->router->map('POST', '/cards/[i:id]/update', 'CardController#update', 'card_update');
    }

    // Méthode permettant d'exécuter la méthode du controller correspondant à l'URL accédée
    public function run()
    {
        // On demande à AltoRouter de trouver si une des routes "mappées"
        // correspond à l'URL courante (de la page actuelle)
        $match = $this->router->match();

        // -- DISPATCH --
        // Si il y a un match (correspondance)
        if ($match !== false) {
            // Alors je veux récupérer le nom du Controller et le nom de la méthode à appeler
            $target = $match['target'];
            $urlParamsFromMatch = $match['params'];
            // dump($target);
            // dump($urlParamsFromMatch);
            // Je sépare la chaine de caractère par le délimiteur #
            $explodedArray = explode('#', $target);
            // dump($explodedArray);
            // Je stocke les infos dans les bonnes variables
            $controllerName = $explodedArray[0];
            $methodName = $explodedArray[1];
            // dump($controllerName);
            // dump($methodName);
        }
        // Sinon 404
        else {
            $controllerName = 'ErrorController';
            $methodName = 'error404';
            $urlParamsFromMatch = [];
        }

        // J'ajoute la Namespace au début de $controllerName
        // Je commence par \ => namespace "absolu" => FQCN => Fully Qualified Class Name
        $controllerName = '\okanban\Controllers\\'.$controllerName;

        // On veut instancier le bon controller
        $controller = new $controllerName($this->router);
        // Puis appeler la méthode de ce controller
        $controller->$methodName($urlParamsFromMatch);
    }
}