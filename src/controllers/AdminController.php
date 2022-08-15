<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/AdminManager.php");

    class AdminController extends MainController{
        private $adminManager;

        public function __construct()
        {
            $this->adminManager = new AdminManager();
        }

        public function rights(){
            $users = $this->adminManager->getUsers();
            $data_page = [
                "bodyClass" => "Admin",
                "page_description" => "Page de gestion des utilisateurs",
                "titre" => "Bienvenu sur l'espace administration",
                "users"=> $users,
                "view" => "src/views/admin/rightsView.php",
                "template" => "src/views/template.view.php",
            ];
            $this->genererPage($data_page);
        }

        public function validateUpdateRole($login,$role){
            if($this->adminManager->bdUpdateRoleuser($login,$role)){
                //die(var_dump($login));
                Toolbox::ajouterMessageAlerte("La modification a été prise en compte ", Toolbox::COULEUR_VERTE);
                header("Location:".URL."admin/rights");
            }else{
                Toolbox::ajouterMessageAlerte("La modification n'a pas été prise en compte ", Toolbox::COULEUR_VERTE);
                header("Location:".URL."admin/rights");
            }
            
        }

        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }
?>