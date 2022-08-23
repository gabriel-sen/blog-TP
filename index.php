<?php
session_start(); // gestion des profiles des utilisateurs 

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"])); // "constante URL" toutes les demandes pointent toujours sur la racide du site.

require_once "src/controllers/routerController.php";

?>