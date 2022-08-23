<?= 

// PARTIE UTILITAIRES
require_once "ToolboxController.php";
require_once "src/model/class/Security.class.php";

// PARTIE DES TYPES D'UTILISATEURS 
require_once("VisitorController.php");
$visitorController = new VisitorController(); // mon controler pilote toute la logique du site, pour toute les pages

require_once("UserController.php");
$userController = new UserController();

require_once("AdminController.php");
$adminController = new AdminController();

// PARTIE DES ARTICLES ET COMENTAIRES 
require_once "ArticlesController.php";
$articlesController = new ArticlesController; // J'instancie mon controller d'article

require_once "ArticleController.php";
$articleController = new ArticleController; // J'instancie mon controller d'article

require_once "ArticleController.php";
$articleController = new ArticleController; // J'instancie mon controller d'article

// PARTIE ADMIN  Articles
require_once "AdminArticlesController.php";
$adminArticlesController = new AdminArticlesController; // J'instancie mon controller d'article

// PARTIE ADMIN Commentaires
require_once "AdminCommentsController.php";
$adminCommentsController = new AdminCommentsController; // J'instancie mon controller d'article





try {
  if(empty($_GET['page'])){ // si page existe alors tu m'execute la condition suivante avec un break pour chaque cas 
      $page = "home";
  } else {
      $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL)); // accéder à des sous dossier pour les compte/profile
      $page = $url[0]; // On stock sous forme de tableau le bon switch case de chaque pages
  }

  switch($page){
    case "compte" : 
        if(!Security::islogged()){
            Toolbox::ajouterMessageAlerte("Veuillez vous connécter", Toolbox::COULEUR_ROUGE);
            header("Location:".URL.'login');
        } else{
            switch($url[1]){
                case "profil": $userController->profil();
                break;
                case "logout": $userController->logout();
                break;
                case "validate_username_modification" : $userController-> validateUsernameModification(Security::secureHTML($_POST['username']));
                break;
                case "changePassword" : $userController-> changePassword();
                break;
                case "validation_modificationPassword" : $userController-> validation_modificationPassword();
                break;
                case "deletAccount" : $userController-> deletAccount();
                break;
                case "validationChangeProfileImage" : $userController-> changeImage($_FILES['img']);
                break;
                default : throw new Exception("La page n'existe pas, "."<a href='../home'>retournez à l'accueil</a>");
            }
        }
    break;
    case "admin" :
      if(!Security::isAdmin()){
        Toolbox::ajouterMessageAlerte("Veuillez vous connécter avec un compt administrateur", Toolbox::COULEUR_ROUGE);
        header("Location:".URL.'login');
      } elseif(!Security::isAdmin()){
          Toolbox::ajouterMessageAlerte("Vous n'êtes plus administrateur.", Toolbox::COULEUR_ROUGE);
          header("Location:".URL.'home');
      } else {
          switch($url[1]){
              case "rights": $adminController ->rights();
              break;
              case "validateUpdateRole": $adminController -> validateUpdateRole($_POST['login'],$_POST['role']);
              break;
              case "articlesManagement" : $adminArticlesController->ArticlesManagement();
              break;
              case "commentsManagement" : $adminCommentsController-> CommentsManagement();
              break;
              default : throw new Exception("La page n'existe pas, "."<a href='home'>retournez à l'accueil</a>");
          }
      }
    break;
    case "home" : $visitorController->accueil();
    break;
    case "contact" : $visitorController ->contactForm();
    break;
    case "articles" : $articlesController->afficherArticles(); // J'appel la fonction afficher livre présent dans mon controller d'article
    break;
    case "login" : $visitorController->login();
    break;
    case "validation_login" : $userController->validationLogin();// contrôle sur les informations de routage des données récupérés (je préfère ne pas le faire dans le controller)
    break;
    case "creataccount" : $visitorController->creataccount();
    break;
    case "validation_creationaccount" : $userController->getValidationCreataccount($_POST['username'],$_POST['login'],$_POST['password']);
    break;
    case "validationMail" : $userController->Validation_mailAccount($url[1],$url[2]);
    break;
    case "resendMail" : $userController->resendMail($url[1]);
    break;
    case "commentSubmition" : $userController -> commentSubmition();
    break;
    case 1 === preg_match('#articleContent\/([\d]+)#', $_GET['page'], $matches) : $articleController->afficherArticle($matches[1]); // REGEX
    break;
    default : throw new Exception("La page n'existe pas, "."<a href='home'>retournez à l'accueil</a>");
  }

} catch (Exception $e){
  $visitorController->pageErreur($e->getMessage()); // On appel une instance de la fonction pageErreur contenu dans MainController EN PRIVATE
}
?>