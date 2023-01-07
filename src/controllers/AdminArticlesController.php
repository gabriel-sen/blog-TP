<?php
require_once "src/model/articlesManager.php";
require_once("./src/model/AdminManager.php");

class AdminArticlesController extends MainController{
    private $articlesManager; // 4) Cette instance est disponnible dans l'attribut Private
    private $adminManager;


    public function ArticlesManagement(){
        $articles = $this->articlesManager->getArticles(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        $data_page = [
            "bodyClass" => "articles",
            "page_description" => "Description de la page d'accueil",
            "imgBase" => "./public/assets/images/article/articleBase.png",
            "titre" => "Management des articles :",
            "view" => "src/views/admin/articlesManagementView.php",
            "template" => "src/views/templateView.php",
            "articles" => $articles
        ];
        $this->genererPage($data_page);

    }

    public function AdminDeletArticle($artId){
        $artId = $_POST['article_id'];
        //die(var_dump($artId));
        $this->adminManager->requestDeletArticle($artId);
        Toolbox::ajouterMessageAlerte("Article supprimé .", Toolbox::COULEUR_VERTE);
        header("Location:".URL.'admin/articlesManagement');
    }
    public function AdminValidateArticle($artId){
        $artId = $_POST['article_id'];
        //die(var_dump($artId));
        $this->adminManager->requestValidateArticle($artId);
        Toolbox::ajouterMessageAlerte("Article validé .", Toolbox::COULEUR_VERTE);
        header("Location:".URL.'admin/articlesManagement');
    }
    
    public function __construct(){ // 1) au moment de la construction
        $this->adminManager = new AdminManager();
        $this->articlesManager = new ArticlesManager(new CommentsManager); // 2) J'instantie un nouvel article depuis son objet
        $this->articlesManager->chargeArticles(); // 3) J'y charge les données de la BD
    }


}