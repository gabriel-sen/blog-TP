<?php
require_once "src/model/ArticlesManager.php";
require_once("src/model/UserManager.php");

class ArticleController extends MainController{
    private $articleManager; // 4) Cette instance est disponnible dans l'attribut Private

    public function afficherArticle(string $id){
        $article = $this->articleManager->getArticle($id); // 5) Je récupère tout mes articles que je stock dans ma variable .
        $data_page = [
            "bodyClass" => "articles",
            "imgBase" => "../public/assets/images/article/articleBase.png",
            "page_description" => "ceci est un article du blog de gabriel sen",
            "view" => "src/views/articleView.php",
            "template" => "src/views/template.view.php",
            "article" => $article
        ];
        $this->genererPage($data_page);

    }

    public function __construct(){ // 1) au moment de la construction
        $this->articleManager = new ArticlesManager(new CommentsManager); // 2) J'instantie un nouvel article depuis son objet
        $this->articleManager->chargeArticles(); // 3) J'y charge les données de la BD
    }
}