<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/UserManager.php");
 require_once("./src/model/CommentManager.php");
 require_once "ArticleController.php";

    class CommentController extends MainController{
        private $commentManager;

        public function __construct()
        {
            $this->commentManager = new CommentsManager();
            $this->userManager = new UserManager();
            $this->articleController = new ArticleController;
        }
        //ENVOIE COMMENTAIRE 
        public function commentSubmition(){      
            $user_id= $_POST['user_id'];
            $article_id= $_POST['article_id'];
            $comment_text= $_POST['comment_text'];
            $comment_date= $_POST['comment_date'];
            if(!empty($user_id && $article_id && $comment_text && $comment_date )){ 
                $this->commentManager->sendComments($user_id,$article_id,$comment_text,$comment_date);
                Toolbox::ajouterMessageAlerte("Votre commentaire est soumis à validation par l'administrateur, il sera disponnible bientot.", Toolbox::COULEUR_VERTE);
                header("Location:".URL.'articleContent/'.$article_id);
            } else {
                Toolbox::ajouterMessageAlerte("Veuillez remplire tout les champs du formulaire", Toolbox::COULEUR_ROUGE);
                header("Location:".URL.'articleContent/'.$article_id);
            }
            
        }
        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }
?>