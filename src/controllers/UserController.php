<?php
 require_once("./src/controllers/MainController.php");
 require_once("./src/model/UserManager.php");
 require_once("./src/model/CommentManager.php");

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
                    Toolbox::ajouterMessageAlerte("Le compte ".$login." n'a pas été activé, verifiez vos emails "."<a href='resendMail/$login'>Renvoyez le lien par mail</a>", Toolbox::COULEUR_ROUGE);
                    header("Location:".URL."login");
                }
            } else{
                Toolbox::ajouterMessageAlerte("Combinaison Login / mot de passe non valide", Toolbox::COULEUR_ROUGE);
                header("Location:".URL."login"); // rootage vers le login + message d'erreur 
            }
        }
        //ENVOIE COMMENTAIRE 
        public function commentSubmition(){        
            $id = $this->userManager->getUserInformation($_SESSION['profil']['login']);
            $_SESSION['profil']['user_id'] = $id['user_id'];  
            $this->CommentManager->sendComments();
        }
        // PROFILE
        public function profil(){
            $datas = $this->userManager->getUserInformation($_SESSION['profil']['login']);
            $_SESSION['profil']['username'] = $datas['username']; // Je stock en variable de session le username du profile via la requette de la fonction getUserInformation
            $_SESSION['role'] = $datas['role'];
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
            session_destroy();
            Toolbox::ajouterMessageAlerte("La déconnection du profile est établie avec succès, à bientot :)", Toolbox::COULEUR_VERTE);
            header("Location:".URL."home");
        }
        // VALIDRATION CREATION DE COMPTE
        public function getValidationCreataccount($username,$login,$password){
            if(!empty($username) && !empty($login) && !empty($password)){
                $username = Security::secureHTML($_POST['username']);
                $login = Security::secureHTML($_POST['login']);
                $password = Security::secureHTML($_POST['password']);
                $this->validation_creataccount($username,$login,$password);
              }else{
                  Toolbox::ajouterMessageAlerte("Veuillez remplire tout les champs du formulaire", Toolbox::COULEUR_ROUGE);
                  header("Location:".URL.'creataccount');
              }
        }
        public function validation_creataccount($username,$login,$password){
            if($this->userManager->isLoginAvalable($login)){
                $passwordCrypted = password_hash($password,PASSWORD_DEFAULT);
                $key = rand(0,9999);
                if($this->userManager->bdCreatAccount($username,$login,$key,$passwordCrypted,"profils/profil.jpg","user")){ // image de profile de base pour tout les utilisateurs
                    $this->sendMailValidation($username,$login,$key);
                    Toolbox::ajouterMessageAlerte("Le compte a été créé, un mail de validation vous as été envoyé.)", Toolbox::COULEUR_VERTE);
                    header("Location:".URL."login");
                }else{
                    Toolbox::ajouterMessageAlerte("La création de compte a échoué, veillez recommencer.)", Toolbox::COULEUR_ROUGE);
                    header("Location:".URL."creataccount");
                }
            }else{
                Toolbox::ajouterMessageAlerte("Le login est déjà utilisé ! ", Toolbox::COULEUR_ROUGE);
                header("Location:".URL.'creataccount');
            }
        }
        // ENVOIE DE MAIL 
        private function sendMailValidation($username,$login,$key){
            $urlVerification = URL."validationMail/".$login."/".$key;
            $subject = "Creation du compte sur le blog de Gabriel pour ".$username;
            $message = "Pour valider votre compte, veuillez cliquer sur le lien suivant :".$urlVerification;
            Toolbox::sendMail($login,$subject,$message);
        }

        public function resendMail($login){
            $user = $this->userManager->getUserInformation($login);
            $this->sendMailValidation($login,$user['email'],$user['clef']);
            //die(var_dump($this));
            header("Location:".URL.'login');

        }
        // ACTIVATION DU COMPTE
        public function Validation_mailAccount($login,$key){
            if($this->userManager->dbValidationMailAccount($login,$key)){
                Toolbox::ajouterMessageAlerte("Le compte à été activé.", Toolbox::COULEUR_VERTE);
                header("Location:".URL."compte/profil");
            } else{
                Toolbox::ajouterMessageAlerte("Le compte n'as pas été activé.", Toolbox::COULEUR_ROUGE);
                header("Location:".URL.'login');
            }
        }
        public function validationLogin(){
            if(!empty($_POST['login']) && !empty($_POST['password'])){
                $login = Security::secureHTML($_POST['login']);
                //die(var_dump($login));
                $password = Security::secureHTML($_POST['password']);
                //die(var_dump($password));
                $this->validation_login($login,$password);
                //die(var_dump($userController));
            } else{
                Toolbox::ajouterMessageAlerte("login ou mot de passe incorecte ", Toolbox::COULEUR_ROUGE);
                header("Location:".URL.'login');
            }
        }
        // MODIFICATION username
        public function validateUsernameModification($username){
            if($this->userManager->bdModificationUsername($_SESSION["profil"]["login"],$username)){
                Toolbox::ajouterMessageAlerte("username modifié avec succès.", Toolbox::COULEUR_VERTE);
            } else{
                Toolbox::ajouterMessageAlerte("modification du username échoué.", Toolbox::COULEUR_ROUGE);
            }
            header("Location:".URL."compte/profil");
        }

        // MODIFICATION DE PASSWORD
        public function changePassword(){
            $data_page = [
                "bodyClass" => "changePassword",
                "page_description" => "Page de modification de Password",
                "titre" => "Modification du mot de passe de ".$_SESSION['profil']['username'],
                "view" => "src/views/changePassword.view.php",
                "template" => "src/views/template.view.php",
            ];
            $this->genererPage($data_page);
        }
        // VALIDATION MODIFICATION DE PASSWORD
        public function validation_modificationPassword(){
            $oldPassword = Security::secureHTML($_POST['oldPassword']) ;
            $newPassword = Security::secureHTML($_POST['newPassword']) ;
            $newPasswordConfirmation = Security::secureHTML($_POST['newPasswordConfirmation']) ;

            if(!empty($oldPassword && $newPassword && $newPasswordConfirmation)){
                if($newPassword === $newPasswordConfirmation){
                    if($this->userManager->isCombinValid($_SESSION['profil']['login'],$oldPassword)){ // On verifie que le mot de passe de l'ancien MDP du login est bien présent en BD
                        $newPasswordEncryption = password_hash($newPassword, PASSWORD_DEFAULT);
                        if($this->userManager->bdChangePassword($_SESSION['profil']['login'],$newPasswordEncryption)){
                            Toolbox::ajouterMessageAlerte("Modification avec succès.", Toolbox::COULEUR_VERTE);
                            header("Location:".URL."compte/profil");
                        } else{
                            Toolbox::ajouterMessageAlerte("La modification à échoué pour une raison inconnue, contactez l'adm:inistrateur : admin-blog-TP@gmail.com.", Toolbox::COULEUR_ROUGE);
                            header("Location:".URL."compte/changePassword");
                        }

                    } else{
                        Toolbox::ajouterMessageAlerte("Le mot de passe renseigné en champs ancien mot de passe ne correspond pas au mot de passe du compte. Veuillez re-essayer d'entrer votre mot de passe actuel", Toolbox::COULEUR_ROUGE);
                        header("Location:".URL."compte/changePassword");
                    }
                }else{
                    Toolbox::ajouterMessageAlerte("les password ne correspondent pas.", Toolbox::COULEUR_ROUGE);
                    header("Location:".URL."compte/changePassword");
                }
            } else {
                Toolbox::ajouterMessageAlerte("Vous n'avez pas renseigné toutes les informations.", Toolbox::COULEUR_ROUGE);
                header("Location:".URL."compte/changePassword");
            }
        }
        // SUPRESSION DE COMPTE
        public function deletAccount(){
            $this->fileUserImgDelet($_SESSION['profil']['login']);
            rmdir("./public/Assets/images/profils/".$_SESSION['profil']['login']);
            if($this->userManager->dbDeletAccount($_SESSION['profil']['login'])){
                Toolbox::ajouterMessageAlerte("suppression du compte éfféctuée avec succès.", Toolbox::COULEUR_VERTE);
                $this->logout();
            } else{
                Toolbox::ajouterMessageAlerte("La suppression à échoué pour une raison inconnue, contactez l'adm:inistrateur : admin-blog-TP@gmail.com.", Toolbox::COULEUR_ROUGE);
                header("Location:".URL."compte/profil");
            }
        }
        // CHANGER L'IMAGE DE PROFILE
        public function changeImage($file){
            
            try{
                $repository = "./public/Assets/images/profils/".$_SESSION['profil']['login']."/";
                if($_FILES['img']['size'] > 0){
                    // ajout de l'image dans le repertoir
                    $nameImage = Toolbox::addImage($file,$repository);
                    // on supprime l'image précédante si different de profile.jpg
                    $this->fileUserImgDelet($_SESSION['profil']['login']);
                    // on ajoute la nouvel image dans la BD
                    $nameImageforBd = "profils/".$_SESSION['profil']['login']."/".$nameImage; // URL de l'image stocké en BD
                    //var_dump($nameImageforBd);
                    if($this->userManager->dbAddImg($_SESSION['profil']['login'],$nameImageforBd)){
                        Toolbox::ajouterMessageAlerte("Image correctement ajouté en Base de donnée.", Toolbox::COULEUR_VERTE);
                        header("Location:".URL."compte/profil");
                    } else {
                        Toolbox::ajouterMessageAlerte("L'ajout de l'image en Base de données à échoué.", Toolbox::COULEUR_ROUGE);
                    }
                } else {
                    Toolbox::ajouterMessageAlerte("Vous n'avez pas modifié l'image.", Toolbox::COULEUR_ROUGE);
                }
            }catch(Exception $exeption){
                Toolbox::ajouterMessageAlerte($exeption->getMessage(),Toolbox::COULEUR_ROUGE);
            }
        }
        // SUPPRESSION DE l'IMAGE
        private function fileUserImgDelet(){
            $oldImageName = $this->userManager->getImageUser($_SESSION['profil']['login']);
            if($oldImageName !== "profils/profil.jpg"){ 
                unlink("public/Assets/images/".$oldImageName);
            }
        }

        public function pageErreur($msg){
            parent::pageErreur($msg); // on fait hériter l'objet pageErreur en passant la variable $msg pour y avoir accès sur toutes les pâges des visiteurs
        }
    }
?>