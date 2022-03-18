<?php
    require_once "model.class.php";
    require_once "class/Article.class.php";

    class ArticleManager extends Model{
        private $articles;

        public function ajouterArticles($article){
            $this->articles[] = $article;
        }

        public function getArticles(){
            return $this->articles;
        }

        public function chargeArticles(){
            $req = $this->getBdd()->prepare('SELECT articles_id, article_author_id, article_image, article_title, article_subtitle, article_content, article_date_creation, article_date_modification, user.username FROM articles INNER JOIN user ON articles.articles_id = user.user_id');
            $req->execute();
            $myArticles = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($myArticles as $article){
                $a = New Article(
                    $article['articles_id'],
                    $article['article_author_id'],
                    $article['article_image'],
                    $article['article_title'],
                    $article['article_subtitle'],
                    $article['article_content'],
                    $article['article_date_creation'],
                    $article['article_date_modification'],
                    $article['username']);
                    $this->ajouterArticles($a);
            }
        }
    }