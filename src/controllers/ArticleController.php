<?php
require_once ("src/model/ArticlesManager.php");
require_once("src/model/UserManager.php");
require_once("src/model/CommentManager.php");
require_once("UserController.php");

class ArticleController extends MainController{
    private $articleManager; // 4) Cette instance est disponnible dans l'attribut Private
    private $userManager;

    public function afficherArticle(string $id){
        $article = $this->articleManager->getArticle($id); // 5) Je récupère tout mes articles que je stock dans ma variable .
        if(Security::isVisitor()){
            $data_page = [
                "bodyClass" => "article",
                "imgBase" => "../public/assets/images/article/articleBase.png",
                "page_description" => "ceci est un article du blog de gabriel sen",
                "view" => "src/views/articleView.php",
                "template" => "src/views/template.view.php",
                "article" => $article,
                "articleId" => $article->getId(),
            ];
            $this->genererPage($data_page);
        } else{
            $dataIdUser = $this->userManager->getUserInformation($_SESSION['profil']['login']);
            //die(var_dump($dataIdUser));
            $_SESSION['profil']['username'] = $dataIdUser['username'];
            $_SESSION['profil']['user_id'] = $dataIdUser['user_id'];
            $data_page = [
                "bodyClass" => "article",
                "imgBase" => "../public/assets/images/article/articleBase.png",
                "page_description" => "ceci est un article du blog de gabriel sen",
                "view" => "src/views/articleView.php",
                "template" => "src/views/template.view.php",
                "article" => $article,
                "articleId" => $article->getId(),
                "user_id"=> $_SESSION['profil']['user_id'], 
            ];
            $this->genererPage($data_page);
        }
    }

    public function __construct(){ // 1) au moment de la construction
        $this->articleManager = new ArticlesManager(new CommentsManager); // 2) J'instantie un nouvel article depuis son objet
        $this->articleManager->chargeArticles(); // 3) J'y charge les données de la BD
        $this->commentManager = new CommentsManager();
        $this->userManager = new UserManager();
    }
}