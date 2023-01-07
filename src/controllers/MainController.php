<?php

require_once("src/model/MainManager.php");
require_once("ToolboxController.php");

abstract class MainController{

    protected function genererPage($data){
        extract($data);
        ob_start();
        require_once($view);
        $content = ob_get_clean();
        require_once($template);
    }

    //Propriété "page_css" : tableau permettant d'ajouter des fichiers CSS spécifiques
    //Propriété "page_javascript" : tableau permettant d'ajouter des fichiers JavaScript spécifiques
    public function accueil(){
        // Toolbox::ajouterMessageAlerte("test", Toolbox::COULEUR_VERTE);

        $data_page = [
            "bodyClass" => "home",
            "page_description" => "Description de la page d'accueil",
            "titre" => "Titre de la page d'accueil",
            "view" => "src/views/homeView.php",
            "template" => "src/views/templateView.php",
        ];
        $this->genererPage($data_page);
    }

    protected function pageErreur($msg){
        $data_page = [
            "bodyClass" => "erreur",
            "page_description" => "Page permettant de gérer les erreurs",
            "titre" => "Page d'erreur",
            "msg" => $msg,
            "view" => "src/views/erreurView.php",
            "template" => "src/views/templateView.php",
            "content" => "La page désité d'existe pasn'existe pas"
        ];
        $this->genererPage($data_page);
    }

}