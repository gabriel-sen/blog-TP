<?php
session_start(); // gestion des profiles des utilisateurs 

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"])); // "constante URL" toutes les demandes pointent toujours sur la racide du site.

require_once("src/controllers/VisitorController.php");
$visitorController = new VisitorController(); // mon controler pilote toute la logique du site, pour toute les pages

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
      case "creat-account" : require "src/views/acount-creation.view.php";
      break;
      case 1 === preg_match('#articleContent\/([\d]+)#', $_GET['page'], $matches) : $articleController->afficherArticle($matches[1]); // REGEX
      
      break;


      default : throw new Exception("La page n'existe pas");
  }
} catch (Exception $e){
  $visitorController->pageErreur($e->getMessage()); // On appel une instance de la fonction pageErreur contenu dans MainController EN PRIVATE
}