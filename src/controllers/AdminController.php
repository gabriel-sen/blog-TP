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
                "titre" => "Gestion des rôles :",
                "users"=> $users,
                "view" => "src/views/admin/rightsView.php",
                "template" => "src/views/templateView.php",
            ];
            $this->genererPage($data_page);
        }

        public function validateUpdateRole($login,$role){

            if($_POST['role'] == "user"){
                $this->adminManager->bdUpdateRoleuser($login,$role);
                Toolbox::ajouterMessageAlerte("Vous êtes devenus Admin ", Toolbox::COULEUR_VERTE);
                header("Location:".URL."admin/rights");
            }elseif($_POST['role'] == "admin"){
                $this->adminManager->bdUpdateRoleAminToUser($login,$role);
                Toolbox::ajouterMessageAlerte("Vous êtes revenus à un role User ", Toolbox::COULEUR_VERTE);
                header("Location:".URL."admin/rights");
            }else{
                Toolbox::ajouterMessageAlerte("La modification n'a pas été prise en compte ", Toolbox::COULEUR_ROUGE);
                header("Location:".URL."admin/rights");
            }
            
        }

        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }
?>