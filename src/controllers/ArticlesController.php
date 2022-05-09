<?php
require_once "src/model/articlesManager.php";

class ArticlesController{
    private $articlesManager; // 4) Cette instance est disponnible dans l'attribut Private

    private function genererPage($data){
        extract($data);
        ob_start();
        require_once($view);
        $content = ob_get_clean();
        require_once($template);
    }

    public function afficherArticles(){
        $articles = $this->articlesManager->getArticles(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        $data_page = [
            "bodyClass" => "articles",
            "page_description" => "Description de la page d'accueil",
            "titre" => "Tout les articles :",
            "view" => "src/views/articles.view.php",
            "template" => "src/views/template.view.php",
            "articles" => $articles
        ];
        $this->genererPage($data_page);

    }
    
    public function __construct(){ // 1) au moment de la construction
        $this->articlesManager = new ArticlesManager(new CommentsManager); // 2) J'instantie un nouvel article depuis son objet
        $this->articlesManager->chargeArticles(); // 3) J'y charge les données de la BD
    }


}