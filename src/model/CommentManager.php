<?php
    require_once "class/pdo.class.php";
    require_once "class/Comment.class.php";

    class CommentsManager extends Model{

        // AFFICHER ARTICLE SEUL 
        public function getComments(string $articleId){
            $req = $this->getBdd()->prepare(
                'SELECT *, user.username 
                FROM comments 
                INNER JOIN articles 
                ON comments.comment_article_id = articles.articles_id 
                INNER JOIN user 
                ON  user.user_id = comments.user_id 
                WHERE articles.articles_id = :articleId');
            $req->bindParam('articleId', $articleId, PDO::PARAM_INT);
            $req->execute();
            $comments = $req->fetchAll(PDO::FETCH_ASSOC);
            //die(var_dump($comments));
            $req->closeCursor();
            
            $results = [];

            foreach($comments as $comment) {
                $results[] = new Comment(
                    $comment['comment_id'],
                    $comment['username'],
                    $comment['comment_text'],
                    $comment['comment_date'],
                    $comment['username']);
            }
            return $results;
        }
        public function sendComments(){
            die(var_dump($_POST));
        }
    }