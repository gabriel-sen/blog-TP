<?php
    require_once "./src/model/model.class.php";
    require_once "class/Comment.class.php";

    class CommentsManager extends Model{
        private $comments;

        public function ajouterComments($comment){
            $this->comments[] = $comment;
        }

        public function getComments(){
            return $this->comments;
        }

        public function chargeComment(){
            $req = $this->getBdd()->prepare('SELECT comment_id, comment_author_id, comment_text, comment_date, user.username FROM comments INNER JOIN user ON comments.comment_id = user.user_id');
            $req->execute();
            $myComments = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($myComments as $comment){
                $c = New Comment(
                    $comment['comment_id'],
                    $comment['username'],
                    $comment['comment_text'],
                    $comment['comment_date']);
                    $this->ajouterComments($c);
            }
        }
    }