<?php

// Je place la classe dans le namespace
// => je place cette classe dans un sous-dossier virtuel
namespace okanban\Controllers; // Pas de \ au début

// Utilise/importe ce FQCN pour toute demande de DBData
// C'est comme définir un alias pour "DBData"

class CoreController {
    /** @var AltoRouter */
    protected $router;

    /** @var array */
    private $viewVars;

    /**
     * @param AltoRouter $routerParam
     */
    public function __construct($routerParam) {
        $this->router = $routerParam;
        // Je crée une instance de DBData
        $this->viewVars = [
            'baseURL' => isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '',
            'router' => $this->router
        ];
    }

    /**
     * Méthode permettant d'ajouter une donée aux views
     * 
     * @param string $varName
     * @param mixed $varValue
     */
    protected function assign($varName, $varValue) {
        $this->viewVars[$varName] = $varValue;
    }

    /**
     * Méthode s'occupant d'afficher une template (+ header et footer)
     * 
     * @param string $viewName
     */
    protected function show($viewName) {
        // dump($viewVars);exit;
        foreach ($this->viewVars as $viewVarName=>$viewVarValue) {
            // echo 'clé = '.$viewVarName.'<br>';
            // Je crée une variable pour chaque donnée transmise à la view
            // La clé du tableau, devient le nom de la variable
            // La valeur devient la valeur de la variable
            // Geika : ton truc reviens à dire on crée la variable $viewVarName et on lui met direct $viewVarValue dedans?
            $$viewVarName = $viewVarValue;
            // ET BIM !
        }

        include __DIR__.'/../views/header.tpl.php';
        include __DIR__.'/../views/'.$viewName.'.tpl.php';
        include __DIR__.'/../views/footer.tpl.php';
    }

    protected function showJson($data)
    {
        // Autorise l'accès à la ressource depuis n'importe quel autre domaine
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        // Dit au navigateur que la réponse est au format JSON
        header('Content-Type: application/json');
        // La réponse en JSON est affichée
        echo json_encode($data);
    }

}