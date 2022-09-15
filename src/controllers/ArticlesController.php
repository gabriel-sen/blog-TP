<?php
require_once "src/model/articlesManager.php";

class ArticlesController extends MainController{
    private $articlesManager; // 4) Cette instance est disponnible dans l'attribut Private
    private $userManager;

    public function uuidGenerator($uniqueID = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $uniqueID = $uniqueID ?? random_bytes(16);
        assert(strlen($uniqueID) == 16);
    
        // Set version to 0100
        $uniqueID[6] = chr(ord($uniqueID[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $uniqueID[8] = chr(ord($uniqueID[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($uniqueID), 4));
    }

    public function afficherArticles(){
        $dataIdUser = $this->userManager->getUserInformation($_SESSION['profil']['login']);
        $articles = $this->articlesManager->getArticles(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        $_SESSION['profil']['user_id'] = $dataIdUser['user_id'];
        $data_page = [
            "bodyClass" => "articles",
            "page_description" => "Description de la page d'accueil",
            "imgBase" => "./public/assets/images/article/articleBase.png",
            "titre" => "Les articles :",
            "view" => "src/views/articles.view.php",
            "template" => "src/views/template.view.php",
            "articles" => $articles,
            "myuuid" => $this->uuidGenerator(),
            "user_id"=> $_SESSION['profil']['user_id'],
        ];
        $this->genererPage($data_page);
    }
    public function addArticle(){
        if (!empty($_POST)){
            $article_image = $_POST['article_image'];
            $article_id = $_POST['article_id'];
            $article_author_id = $_POST['article_author_id'];
            $article_title = $_POST['article_title'];
            $article_subtitle = $_POST['article_subtitle'];
            $article_content = $_POST['article_content'];
            $article_date_creation = $_POST['article_date_creation'];
            $article_date_modification = $_POST['article_date_modification'];
            //die(var_dump($article_image));
            $repository = "./public/Assets/images/article/";
            //die(var_dump($repository));
            //$article_new_name = Toolbox::addImage($article_image,$repository);
            //die(var_dump($article_new_name));
            $this->articlesManager->dbAddArticle($article_image,$article_id,$article_author_id,$article_title,$article_subtitle,$article_content,$article_date_creation,$article_date_modification);
            //die(var_dump($this));
            Toolbox::ajouterMessageAlerte("L'article est envoyé en validation par l'administrateur.", Toolbox::COULEUR_VERTE);
            header("Location:".URL."articles");
        }else{
            Toolbox::ajouterMessageAlerte("L'article n'est pas publié.", Toolbox::COULEUR_ROUGE);
            header("Location:".URL."articles");
        }

    }
    
    public function __construct(){ // 1) au moment de la construction
        $this->articlesManager = new ArticlesManager(new CommentsManager); // 2) J'instantie un nouvel article depuis son objet
        $this->articlesManager->chargeArticles(); // 3) J'y charge les données de la BD
        $this->userManager = new UserManager();
    }


}