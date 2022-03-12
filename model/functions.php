<?php
// FONCTION QUI RECUPERE TOUT LES ARTICLES 
function getArticles()
{
    require('./config/connect.php');
    $req = $bdd->prepare('SELECT articles_id, article_author_id, article_title, article_content, article_date, user.username FROM articles INNER JOIN user ON articles.articles_id = user.user_id');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}