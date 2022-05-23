<?php
require_once("MainManager.php");

class UserManager extends MainManager{
    public function getUsers(){
        $req = $this->getBdd()->prepare("SELECT * FROM user");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    private function getPasswordUser($login){
        $req = "SELECT password FROM 'user' WHERE email = :email"; // on recupère le password dela table user pour l'utilisateur qui as le login qui va être :login 
        $statment = $this->getBdd()->prepare($req); // on prépare la requette 
        $statment->bindValue(":email",$login,PDO::PARAM_STR); // On renseigne la valeure de login via vinValue et on sécurise la requette pour éviter les injection SQL grace au parametre_STRING de la donnée.
        $statment->execute(); // on execute la requette 
        $admin = $statment->fetch(PDO::FETCH_ASSOC); //Je récupère la data en empéchant la duplication des datas retournés.
        $statment->closeCursor(); // On ferme la requette pour libérer l'espace pour executer d'autres requettes. 

        return $admin['password'];
    }

    public function isCombinValid($login,$password){
        $passwordBD = $this->getPasswordUser($login);
        echo $passwordBD;
        return password_verify($passwordBD, $password); // Si la combinaison vérifié est vrais, alors la retunr est TRUE
    }
}