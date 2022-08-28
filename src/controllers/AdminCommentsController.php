<?php
require_once ("src/model/ArticlesManager.php");
require_once("src/model/UserManager.php");
require_once("src/model/CommentManager.php");
require_once "commentController.php";

class AdminCommentsController extends MainController{
    private $commentManager;
    private $articlesManager; 

    public function commentsManagement(){
        $articles = $this->articlesManager->getArticles();
        
        //die(var_dump($articles));
        $data_page = [
            "bodyClass" => "admin_commantaire",
            "page_description" => "",
            "imgBase" => "./public/assets/images/article/articleBase.png",
            "titre" => "Liste des commentaires classés par Articles :",
            "view" => "src/views/admin/commentsManagementView.php",
            "template" => "src/views/template.view.php",
            "articles" => $articles,
            
            //"article" => $article,
            //"articleId" => $article->getId(),
        ];
        $this->genererPage($data_page);
    }
    
    public function __construct(){ // 1) au moment de la construction
        $this->commentManager = new CommentsManager();
        $this->articlesManager = new ArticlesManager(new CommentsManager); // 2) J'instantie un nouvel article depuis son objet
        $this->articlesManager->chargeArticles(); // 3) J'y charge les données de la BD
        
    }


}