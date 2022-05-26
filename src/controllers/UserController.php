<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/UserManager.php");

    class UserController extends MainController{
        private $userManager;

        public function __construct()
        {
            $this->userManager = new UserManager();
        }
        public function validation_login($login,$password){
            if($this->userManager->isCombinValid($login,$password)){ // On verifie SI l'entrée utilisateur existe bien en BD
                if($this->userManager->isAccountValide($login)){
                Toolbox::ajouterMessageAlerte("Connection établie, bon retour sur le site ".$login, Toolbox::COULEUR_VERTE);

                $_SESSION['profil'] = [ // Je sauvegarde en variable de session dans un tableau les differentes clée que je souhaite disposer pour ce compte
                    "login" => $login,
                ];
                header("Location:".URL.'compte/profil'); // Rootage vers le sous répertoire compte comptenant le profile de l'utilisateur connécté.
                } else {
                    Toolbox::ajouterMessageAlerte("Le compte ".$login." n'a pas été activé, verifiez vos emails", Toolbox::COULEUR_ROUGE);
                    header("Location:".URL."login");
                }
            } else{
                Toolbox::ajouterMessageAlerte("Combinaison Login / mot de passe non valide", Toolbox::COULEUR_ROUGE);
                header("Location:".URL."login"); // rootage vers le login + message d'erreur 
            }
        }

        public function profil(){
            $datas = $this->userManager->getUserInformation($_SESSION['profil']['login']);
            $_SESSION['profil']['username'] = $datas['username']; // Je stock en variable de session le username du profile via la requette de la fonction getUserInformation
            $_SESSION['profil']['role'] = $datas['role'];
            $_SESSION['profil']['img'] = $datas['img'];
            $data_page = [
                "bodyClass" => "profil",
                "page_description" => "Page de profil",
                "userData" => $datas, // J'envoie les donnés à la vue
                "titre" => "Page de profil de ".$_SESSION['profil']['username'],
                "view" => "src/views/profil.view.php",
                "template" => "src/views/template.view.php",
            ];
            $this->genererPage($data_page);
        }
        public function logout(){
            unset($_SESSION['profil']); // supprime la variable de sesion de profile
            Toolbox::ajouterMessageAlerte("La déconnection du profile est établie avec succès, à bientot :)", Toolbox::COULEUR_VERTE);
            header("Location:".URL."home");
        }
        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }