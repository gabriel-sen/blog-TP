<?php
require_once "src/model/articlesManager.php";

class ArticlesController{
    private $articlesManager; // 4) Cette instance est disponnible dans l'attribut Private

    public function __construct(){ // 1) au moment de la construction
        $this->articlesManager = new ArticlesManager; // 2) J'instantie un nouvel article depuis son objet
        $this->articlesManager->chargeArticles(); // 3) J'y charge les données de la BD
    }

    public function afficherArticles(){
        $articles = $this->articlesManager->getArticles(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        require "src/views/articles.view.php"; // 6) qui est affiché dans ma vue
    }
}