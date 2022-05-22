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
    public function isCombinValid($login,$password){
        return false;
    }
}