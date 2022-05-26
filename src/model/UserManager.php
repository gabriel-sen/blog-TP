<?php
require_once("MainManager.php");

class UserManager extends MainManager{

    // FONCTION DE RECUPERATION DE PASSWORD VIA LE CHAMPS MAIL EN BD
    private function getPasswordUser($login){
        $req = "SELECT password FROM user WHERE email = :email"; // on recupère le password dela table user pour l'utilisateur qui as le login qui va être :login 
        $statment = $this->getBdd()->prepare($req); // on prépare la requette 
        $statment->bindValue(":email",$login,PDO::PARAM_STR); // On renseigne la valeure de login via vinValue et on sécurise la requette pour éviter les injection SQL grace au parametre_STRING de la donnée.
        $statment->execute(); // on execute la requette 
        $result = $statment->fetch(PDO::FETCH_ASSOC); //Je récupère la data en empéchant la duplication des datas retournés.
        //die(var_dump($admin));
        $statment->closeCursor(); // On ferme la requette pour libérer l'espace pour executer d'autres requettes. 

        return $result['password'];
    }
    // FONCTION DE VERIFICATION DE PASSWORD 
    public function isCombinValid($login,$password){
        //return true;
        $passwordBD = $this->getPasswordUser($login); // je écupère $admin contenant unquement le password
        //die(var_dump($passwordBD));
        return password_verify($password,$passwordBD); // Si la combinaison vérifié est vrais, alors la retunr est true 
        // ATTENTION , la fonction password_verify verifie le mot de passe en BD hashé, cad, il retourne false si le champs en BD n'est pas hashé. 
    }
    // FONCTION DE VERIFICATION DE L'ETAT DU COMPTE 
    public function isAccountValide($login){
        $req = "SELECT is_valid FROM user WHERE email = :email"; 
        $statment = $this->getBdd()->prepare($req); 
        $statment->bindValue(":email",$login,PDO::PARAM_STR); 
        $statment->execute(); 
        $result = $statment->fetch(PDO::FETCH_ASSOC); 
        //die(var_dump($result));
        $statment->closeCursor(); 

        return ((int)$result['is_valid'] === 0) ? false : true; // Si l'entier en champs BD is-valid est égale à zéro = false, sinon true.
    }
    // ON RECUPERE TOUTES LES DONNEES DU COMPTE LOGGEE POUR LES AFFICHER AU PROFILE
    public function getUserInformation($login){
        $req = "SELECT * FROM user WHERE email = :email"; 
        $statment = $this->getBdd()->prepare($req);  
        $statment->bindValue(":email",$login,PDO::PARAM_STR); 
        $statment->execute(); 
        $result = $statment->fetch(PDO::FETCH_ASSOC); 
        $statment->closeCursor(); 
        
        return $result;
        die(var_dump($result));
    }
}