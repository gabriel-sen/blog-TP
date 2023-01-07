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
        if(!empty($_SESSION['profil']['login'])){
            $dataIdUser = $this->userManager->getUserInformation($_SESSION['profil']['login']);
            $_SESSION['profil']['user_id'] = $dataIdUser['user_id'];
        }
        $articles = $this->articlesManager->getArticles(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        
        $data_page = [
            "bodyClass" => "articles",
            "page_description" => "Description de la page d'accueil",
            "imgBase" => "./public/assets/images/article/articleBase.png",
            "titre" => "Les articles :",
            "view" => "src/views/articlesView.php",
            "template" => "src/views/templateView.php",
            "articles" => $articles,
            "myuuid" => $this->uuidGenerator(),
            "user_id"=> !empty($_SESSION['profil']['user_id']),
        ];
        $this->genererPage($data_page);
    }
    public function addArticle(){
        $repository = "./public/Assets/images/article/";
        $article_id = $_POST['article_id'];
        $article_author_id = $_POST['article_author_id']; 
        $article_image = $_FILES['article_image'];
        $article_title = $_POST['article_title'];
        $article_subtitle = $_POST['article_subtitle'];
        $article_content = $_POST['article_content'];
        $article_date_creation = $_POST['article_date_creation'];
        $article_date_modification = $_POST['article_date_modification'];
        $article_statut = $_POST['article_statut'];

        $img = strtolower($article_image['name']);
        $img = pathinfo($img, PATHINFO_FILENAME);
        $random = rand(0,99999);
        $img = $img.$random;
        $dir = $img."/".$article_image['name'];

        //die(var_dump($img));
        if (!file_exists($repository.$img)){
            mkdir($repository.$img, 0700);
        }
        if(move_uploaded_file($article_image['tmp_name'], $repository.$dir)){
            $this->articlesManager->dbAddArticle($article_id,$article_author_id,$repository.$dir,$article_title,$article_subtitle,$article_content,$article_date_creation,$article_date_modification,$article_statut);
            Toolbox::ajouterMessageAlerte("L'article est envoyé en validation par l'administrateur.", Toolbox::COULEUR_VERTE);
            header("Location:".URL."articles");
        }else{
            Toolbox::ajouterMessageAlerte("L'article n'est pas publié.", Toolbox::COULEUR_ROUGE);
            header("Location:".URL."articles");
        }
    }
    
    public function __construct(){ // 1) au moment de la construction
        //$this->articlesManager->dbAddArticle();
        $this->articlesManager = new ArticlesManager(new CommentsManager); // 2) J'instantie un nouvel article depuis son objet
        $this->articlesManager->chargeArticles(); // 3) J'y charge les données de la BD
        $this->userManager = new UserManager();
    }


}