<?php
 require_once("./src/controllers/MainController.php");
    class VisitorController extends MainController{
        public function accueil(){

            $data_page = [
                "bodyClass" => "home",
                "page_description" => "Description de la page d'accueil",
                "titre" => "Titre de la page d'accueil",
                "view" => "src/views/home.view.php",
                "template" => "src/views/template.view.php",
            ];
            $this->genererPage($data_page);
        }

        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }