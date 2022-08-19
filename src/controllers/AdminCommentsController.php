<?php
require_once "src/model/articlesManager.php";

class AdminCommentsController extends MainController{
    private $articlesManager; // 4) Cette instance est disponnible dans l'attribut Private


    public function CommentsManagement(){
        $articles = $this->articlesManager->getArticles(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        $data_page = [
            "bodyClass" => "Comments",
            "page_description" => "Description de la page d'accueil",
            "imgBase" => "./public/assets/images/article/articleBase.png",
            "titre" => "Management des Commentaires :",
            "view" => "src/views/admin/commentsManagementView.php",
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