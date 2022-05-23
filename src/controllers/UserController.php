<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/UserManager.php");

    class UserController extends MainController{
        private $userManager;

        public function __construct()
        {
            $this -> userManager = new UserManager();
        }
        public function validation_login($login,$password){
            if($this->userManager->isCombinValid($login,$password)){
                // echo "réussit";
            } else{
                Toolbox::ajouterMessageAlerte("Combinaison Login / mot de passe non valide", Toolbox::COULEUR_ROUGE);
                header('Location:'.URL."login");
            }
        }
        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }