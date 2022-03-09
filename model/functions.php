<?php
// FONCTION QUI RECUPERE TOUT LES ARTICLES 
function getArticles()
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT id, title FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}