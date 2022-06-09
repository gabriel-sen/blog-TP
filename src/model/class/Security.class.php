<?php

class Security{
    public static function secureHTML($chaine){
        return htmlentities($chaine); // supressiond es caractères speciaux 
    }
    public static function islogged(){
        return (!empty($_SESSION['profil'])); //si l'utilistaur est connécté
    }
}