<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/UserManager.php");
 require_once("./src/model/CommentManager.php");

    class CommentController extends MainController{
        private $commentManager;
        private $userManager;
        private $articleManager;

        public function __construct()
        {
            $this->commentManager = new CommentsManager();
            $this->userManager = new UserManager();
        }
        //ENVOIE COMMENTAIRE 
        public function commentSubmition(){      
            //$comment_id= $_POST['comment_id'];
            $user_id= $_POST['user_id'];
            $article_id= $_POST['article_id'];
            $comment_text= $_POST['comment_text'];
            $comment_date= $_POST['comment_date'];
            //$statut=  $_POST['statut'];
            $this->commentManager->sendComments($user_id,$article_id,$comment_text,$comment_date);
        }
        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }
?>