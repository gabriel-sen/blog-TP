<?php
session_start(); // gestion des profiles des utilisateurs 

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"])); // "constante URL" toutes les demandes pointent toujours sur la racide du site.

require_once("src/controllers/MainController.php");
$mainController = new MainController(); // mon controler pilote toute la logique du site, pour toute les pages

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
      $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
      $page = $url[0];
  }

  switch($page){
      case "accueil" : $mainController->accueil();
      break;
      case "compte" : 
          switch($url[1]){
              case "profil": $mainController->accueil();
              break;
          }
      break;
      case "home" : require "src/views/home.view.php";
      break;
      case "articles" : $articlesController->afficherArticles(); // J'appel la fonction afficher livre présent dans mon controller d'article
      break;
      case "creat-account" : require "src/views/acount-creation.view.php";
      break;
      case 1 === preg_match('#articleContent\/([\d]+)#', $_GET['page'], $matches) : $articleController->afficherArticle($matches[1]); // REGEX
      
      break;


      default : throw new Exception("La page n'existe pas");
  }
} catch (Exception $e){
  $mainController->pageErreur($e->getMessage());
}