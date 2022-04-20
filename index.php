<?php
require_once "src/controllers/ArticlesController.php";
$articlesController = new ArticlesController; // J'instancie mon controller d'article

require_once "src/controllers/ArticleController.php";
$articleController = new ArticleController; // J'instancie mon controller d'article

if(empty($_GET['page'])){
  require "src/views/home.view.php";
  } else{
    switch($_GET['page']){
      case "home" : require "src/views/home.view.php";
      break;
      case "articles" : $articlesController->afficherArticles(); // J'appel la fonction afficher livre présent dans mon controller d'article
      break;
      case 1 === preg_match('#articleContent\/([\d]+)#', $_GET['page'], $matches) : $articleController->afficherArticle($matches[1]);
      // REGEX
      break;
    }
  }
