<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/UserManager.php");
 require_once("./src/model/CommentManager.php");

    class CommentController extends MainController{
        private $commentManager;

        public function __construct()
        {
            $this->commentManager = new CommentsManager();
            $this->userManager = new UserManager();
        }
        //ENVOIE COMMENTAIRE 
        public function commentSubmition(){      
            $id = $this->userManager->getUserInformation($_SESSION['profil']['login']);
            $_SESSION['profil']['user_id'] = $id['user_id'];  
            $this->commentManager->sendComments();
        }
        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }
?>