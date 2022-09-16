<?php
    require_once "class/pdo.class.php";
    require_once "class/Article.class.php";
    require_once "CommentManager.php";

    class ArticlesManager extends Model{
        private $articles;
        private CommentsManager $commentsManager;

        public function __construct(CommentsManager $commentsManager ){
            $this->commentsManager = $commentsManager;
        }
        public function ajouterArticles($article){
            $this->articles[] = $article;
        }
        public function getArticles(){
            return $this->articles;
            //die(var_dump($this));
        }
        // AFFICHER ARTICLES 
        public function chargeArticles(){
            $req = $this->getBdd()->prepare(
                'SELECT articles.*, user.username 
                FROM articles  
                INNER JOIN user 
                ON articles.article_author_id = user.user_id;'
                );
            $req->execute();
            $myArticles = $req->fetchAll(PDO::FETCH_ASSOC);
            //die(var_dump($myArticles[0]));
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
                    $article['username'],
                    $this->commentsManager -> getComments($article['articles_id'])
                );
                    $this->ajouterArticles($a);
            }
        }

        // AFFICHER ARTICLE SEUL 
        public function getArticle(string $id){
            $req = $this->getBdd()->prepare(
                'SELECT *, user.username 
                FROM articles 
                INNER JOIN user 
                ON articles.article_author_id  = user.user_id 
                WHERE articles_id = :id'
                );
                
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
                $article['username'],
                $this->commentsManager -> getComments($id),
            );
        }

        public function dbAddArticle(
                                    $article_id,
                                    $article_author_id,
                                    $article_new_name,
                                    $article_title,
                                    $article_subtitle,
                                    $article_content,
                                    $article_date_creation,
                                    $article_date_modification,
                                    $article_statut
                                    ){
            $req = "INSERT INTO articles(
                                        articles_id, 
                                        article_author_id, 
                                        article_image, 
                                        article_title, 
                                        article_subtitle, 
                                        article_content, 
                                        article_date_creation, 
                                        article_date_modification,
                                        article_statut) 
                    VALUES (
                            :articles_id, 
                            :article_author_id, 
                            :article_image, 
                            :article_title, 
                            :article_subtitle, 
                            :article_content, 
                            :article_date_creation, 
                            :article_date_modification,
                            :article_statut)";
                    
            $statment = $this->getBdd()->prepare($req);
            $statment->bindValue(":articles_id",$article_id,PDO::PARAM_STR);
            $statment->bindValue(":article_author_id",$article_author_id,PDO::PARAM_INT);
            $statment->bindValue(":article_image",$article_new_name,PDO::PARAM_STR);
            $statment->bindValue(":article_title",$article_title,PDO::PARAM_STR);
            $statment->bindValue(":article_subtitle",$article_subtitle,PDO::PARAM_STR);
            $statment->bindValue(":article_content",$article_content,PDO::PARAM_STR);
            $statment->bindValue(":article_date_creation",$article_date_creation,PDO::PARAM_STR);
            $statment->bindValue(":article_date_modification",$article_date_modification,PDO::PARAM_STR);
            $statment->bindValue(":article_statut",$article_statut,PDO::PARAM_INT);
            $statment->execute();
            $isChanged = ($statment->rowCount() > 0);
            //die(var_dump($isChanged));
            $statment->closeCursor();
            return $isChanged;
        }
    }