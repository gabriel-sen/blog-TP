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

    public function requestDeletComment($comId){
        $req = "UPDATE comments set statut = 1 WHERE comment_id = :comment_id";
        $statment = $this->getBdd()->prepare($req);
        $statment->bindValue(":comment_id",$comId,PDO::PARAM_INT);
        $statment->execute();
        $isChanged = ($statment->rowCount() > 0);
        //die(var_dump($isChanged));
        $statment->closeCursor();
        return $isChanged;
    }
    public function requestValidateComment($comId){
        $req = "UPDATE comments set statut = 2 WHERE comment_id = :comment_id";
        $statment = $this->getBdd()->prepare($req);
        $statment->bindValue(":comment_id",$comId,PDO::PARAM_INT);
        $statment->execute();
        $isChanged = ($statment->rowCount() > 0);
        //die(var_dump($isChanged));
        $statment->closeCursor();
        return $isChanged;
    }
    public function requestDeletArticle($artId){
        $req = "UPDATE articles set article_statut = 2 WHERE articles_id = :articles_id";
        $statment = $this->getBdd()->prepare($req);
        $statment->bindValue(":articles_id",$artId,PDO::PARAM_INT);
        $statment->execute();
        $isChanged = ($statment->rowCount() > 0);
        //die(var_dump($isChanged));
        $statment->closeCursor();
        return $isChanged;
    }
    public function requestValidateArticle($artId){
        $req = "UPDATE articles set article_statut = 1 WHERE articles_id = :articles_id";
        $statment = $this->getBdd()->prepare($req);
        $statment->bindValue(":articles_id",$artId,PDO::PARAM_INT);
        $statment->execute();
        $isChanged = ($statment->rowCount() > 0);
        //die(var_dump($isChanged));
        $statment->closeCursor();
        return $isChanged;
    }
}