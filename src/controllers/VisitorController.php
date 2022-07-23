<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/VisitorManager.php");
    class VisitorController extends MainController{
        private $visitorManager;

        public function __construct()
        {
            $this -> visitorManager = new VisitorManager();
        }


        public function accueil(){
            //echo password_hash("test",PASSWORD_DEFAULT); // pour obtenir un hash pour utiliser la fonction Password_verify() qui verifie le hash par lui même.

            $data_page = [
                "bodyClass" => "home",
                "page_description" => "Description de la page d'accueil",
                "titre" => "Titre de la page d'accueil",
                "view" => "src/views/home.view.php",
                "template" => "src/views/template.view.php",
            ];
            $this->genererPage($data_page);
        }

        public function login(){
            $data_page = [
                "bodyClass" => "page de connection",
                "page_description" => "page de connection",
                "titre" => "Login",
                "view" => "src/views/login.view.php",
                "template" => "src/views/template.view.php",
            ];
            $this->genererPage($data_page);
        }

        public function creataccount(){
            $data_page = [
                "bodyClass" => "page de création de compte",
                "page_description" => "page de création de compte",
                "titre" => "Créez votre compte",
                "view" => "src/views/creataccount.view.php",
                "template" => "src/views/template.view.php",
            ];
            $this->genererPage($data_page);
        }

        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }


