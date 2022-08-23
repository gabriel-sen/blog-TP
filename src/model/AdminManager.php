<?php
require_once("MainManager.php");

class AdminManager extends MainManager{
    public function getUsers(){
        $req = $this->getBdd()->prepare("SELECT * FROM user");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    public function bdUpdateRoleuser($login,$role){
        $req = "UPDATE user set role = :role WHERE email = :email ";
        $statment = $this->getBdd()->prepare($req);
        $statment->bindValue(":email",$login,PDO::PARAM_STR);
        $statment->bindValue(":role",$role,PDO::PARAM_STR);
        $statment->execute();
        $isChanged = ($statment->rowCount() > 0);
        $statment->closeCursor();
        return $isChanged;
    }
}