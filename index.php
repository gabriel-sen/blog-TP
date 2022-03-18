<?php
require_once "src/controllers/Articles.controller.php";
$articleController = new ArticlesController; // J'instancie mon controller d'article

require_once "src/controllers/Comments.controller.php";
$commentController = new CommentsController; // J'instancie mon controller de commentaire


if(empty($_GET['page'])){
  require "src/views/home.view.php";
  } else{
    switch($_GET['page']){
      case "home" : require "src/views/home.view.php";
      break;
      case "articles" : $articleController->afficherArticles(); // J'appel la fonction afficher livre présent dans mon controller d'article
      break;
      case "comments" : $commentController->afficherComment(); // J'appel la fonction afficher livre présent dans mon controller d'article
      break;
    }
  }
