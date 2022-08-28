<?php
    require_once "class/pdo.class.php";
    require_once "class/Comment.class.php";

    class CommentsManager extends Model{

        // AFFICHER ARTICLE SEUL 
        public function getComments(string $articleId){
            $req = $this->getBdd()->prepare(
                'SELECT comments.comment_id, comments.comment_text,comments.comment_date,comments.`user_id`, user.username 
                FROM comments 
                INNER JOIN user 
                ON comments.user_id = user.user_id 
                WHERE comment_article_id = :articleId');
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
                    $comment['comment_date']
                );
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