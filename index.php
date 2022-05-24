<?php
session_start(); // gestion des profiles des utilisateurs 

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"])); // "constante URL" toutes les demandes pointent toujours sur la racide du site.

// PARTIE UTILITAIRES
require_once "src/controllers/ToolboxController.php";
require_once "src/model/class/Security.class.php";

// PARTIE DES TYPES D'UTILISATEURS 
require_once("src/controllers/VisitorController.php");
$visitorController = new VisitorController(); // mon controler pilote toute la logique du site, pour toute les pages

require_once("src/controllers/UserController.php");
$userController = new UserController();

// PARTIE DES ARTICLES ET COMENTAIRES 
require_once "src/controllers/ArticlesController.php";
$articlesController = new ArticlesController; // J'instancie mon controller d'article

require_once "src/controllers/ArticleController.php";
$articleController = new ArticleController; // J'instancie mon controller d'article

require_once "src/controllers/ArticleController.php";
$articleController = new ArticleController; // J'instancie mon controller d'article






try {
  if(empty($_GET['page'])){ // si page existe alors tu m'execute la condition suivante avec un break pour chaque cas 
      $page = "home";
  } else {
      $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL)); // accéder à des sous dossier pour les compte/profile
      $page = $url[0]; // On stock sous forme de tableau le bon switch case de chaque pages
  }

  switch($page){
      case "compte" : 
          switch($url[1]){
              case "profil": $visitorController->accueil();
              break;
          }
      break;
      case "home" : $visitorController->accueil();
      break;
      case "articles" : $articlesController->afficherArticles(); // J'appel la fonction afficher livre présent dans mon controller d'article
      break;
      case "login" : $visitorController->login();
      break;
      case "validation_login" : // contrôle sur les informations de routage des données récupérés (je préfère ne pas le faire dans le controller)
        if(!empty($_POST['login']) && !empty($_POST['password'])){
            $login = Security::secureHTML($_POST['login']);
            //die(var_dump($login));
            $password = Security::secureHTML($_POST['password']);
            //die(var_dump($password));
            $userController->validation_login($login,$password);
            die(var_dump($userController));
        } else{
            Toolbox::ajouterMessageAlerte("login ou mot de passe incorecte ", Toolbox::COULEUR_ROUGE);
            header("Location:".URL.'login');
        }
        
      break;
      case 1 === preg_match('#articleContent\/([\d]+)#', $_GET['page'], $matches) : $articleController->afficherArticle($matches[1]); // REGEX
      
      break;


      default : throw new Exception("La page n'existe pas");
  }
} catch (Exception $e){
  $visitorController->pageErreur($e->getMessage()); // On appel une instance de la fonction pageErreur contenu dans MainController EN PRIVATE
}