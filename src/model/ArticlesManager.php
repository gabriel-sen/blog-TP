<?php
    require_once "class/pdo.class.php";
    require_once "class/Article.class.php";

    class ArticlesManager extends Model{
        private $articles;

        public function ajouterArticles($article){
            $this->articles[] = $article;
        }

        public function getArticles(){
            return $this->articles;
        }
        // AFFICHER ARTICLES 
        public function chargeArticles(){
            $req = $this->getBdd()->prepare('SELECT *, user.username FROM articles INNER JOIN user ON articles.articles_id = user.user_id');
            $req->execute();
            $myArticles = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($myArticles as $articles){
                $a = New Article(
                    $articles['articles_id'],
                    $articles['article_author_id'],
                    $articles['article_image'],
                    $articles['article_title'],
                    $articles['article_subtitle'],
                    $articles['article_content'],
                    $articles['article_date_creation'],
                    $articles['article_date_modification'],
                    $articles['username']);
                    $this->ajouterArticles($a);
            }
        }
        
        // AFFICHER ARTICLE SEUL 
        public function getArticle(string $id){
            $req = $this->getBdd()->prepare('SELECT *, user.username FROM articles INNER JOIN user ON articles.articles_id = user.user_id WHERE articles_id = :id');
            $req->bindParam('id', $id, PDO::PARAM_INT);
            $req->execute();
            $article = $req->fetch(PDO::FETCH_ASSOC);
            //die(var_dump($article));
            $req->closeCursor();

            return new Article(
                $article['articles_id'],
                $article['article_author_id'],
                $article['article_image'],
                $article['article_title'],
                $article['article_subtitle'],
                $article['article_content'],
                $article['article_date_creation'],
                $article['article_date_modification'],
                $article['username']);
        }
    }