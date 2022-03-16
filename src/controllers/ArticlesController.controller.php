<?php
require_once "src/model/articleManager.class.php";

class ArticlesController{
    private $articleManager; // 4) Cette instance est disponnible dans l'attribut Private

    public function __construct(){ // 1) au moment de la construction
        $this->articleManager = new ArticleManager; // 2) J'instantie un nouvel article depuis son objet
        $this->articleManager->chargeArticles(); // 3) J'y charge les données de la BD
    }

    public function afficherArticles(){
        $articles = $this->articleManager->getArticles(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        require "src/views/articles.view.php"; // 6) qui est affiché dans ma vue
    }
}