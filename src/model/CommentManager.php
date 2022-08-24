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

    public function sendComments($user_id,$comment_article_id,$comment_text,$comment_date){
        
        $req = "INSERT INTO comments ( user_id, comment_article_id, comment_text, comment_date) 
                VALUES ( :user_id, :comment_article_id, :comment_text, :comment_date)";
        $statment = $this->getBdd()->prepare($req);
        
        $statment->bindValue(":user_id",$user_id,PDO::PARAM_STR);
        $statment->bindValue(":comment_article_id",$comment_article_id,PDO::PARAM_STR);
        $statment->bindValue(":comment_text",$comment_text,PDO::PARAM_STR);
        $statment->bindValue(":comment_date",$comment_date,PDO::PARAM_STR);
        $statment->execute();
        //die(var_dump($statment));
        $isChanged = ($statment->rowCount() > 0);
        $statment->closeCursor();
        return $isChanged;
    }
    }