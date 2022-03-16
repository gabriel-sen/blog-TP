<?php
require_once "src/controllers/ArticlesController.controller.php";
$articleController = new ArticlesController; // J'instancie mon controller de livre 


if(empty($_GET['page'])){
  require "src/views/home.view.php";
  } else{
    switch($_GET['page']){
      case "home" : require "src/views/home.view.php";
      break;
      case "articles" : $articleController->afficherArticles(); // J'appel la fonction afficher livre présent dans mon controller de livre.
      break;
    }
  }
