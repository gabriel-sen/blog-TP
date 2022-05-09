<?php
require_once "src/model/articlesManager.php";

class ArticleController{
    private $articleManager; // 4) Cette instance est disponnible dans l'attribut Private

    private function genererPage($data){
        extract($data);
        ob_start();
        require_once($view);
        $content = ob_get_clean();
        require_once($template);
    }

    public function afficherArticle(string $id){
        $article = $this->articleManager->getArticle($id); // 5) Je récupère tout mes articles que je stock dans ma variable .
        $data_page = [
            "bodyClass" => "articles",
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