<?php

class Security{
    public static function secureHTML($chaine){
        return htmlentities($chaine); // supressiond es caractères speciaux 
    }
    public static function isVisitor(){
        return (empty($_SESSION['profil'])); //si l'utilistaur est un visiteur
    }
    public static function islogged(){
        return (!empty($_SESSION['profil'])); //si l'utilistaur est connécté
    }
    public static function isUser(){
        return ($_SESSION['profil']['role'] === "user"); //si l'utilistaur est user
    }
    public static function isAdmin(){
        return ($_SESSION['profil']['role'] === "admin"); //si l'utilistaur est admin
    }
}