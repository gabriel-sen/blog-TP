<?php

class Security{
    public static function secureHTML($chaine){
        return htmlentities($chaine); // supressiond es caractères speciaux 
    }
    public static function isVisitor(){
        return (empty($_SESSION['role'])); //si visiteur, sa sessione est null
    }
    public static function isLogged(){
        return ($_SESSION['profil']); //si l'utilistaur est connécté
    }
    public static function isUser(){
        return ($_SESSION['role'] === "user"); //si l'utilistaur est user
    }
    public static function isAdmin(){
        return ($_SESSION['role'] === "admin"); //si l'utilistaur est admin
    }
}