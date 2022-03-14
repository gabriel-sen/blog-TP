<?php

class ArticleManager{
    private $articles;

    public function ajouterArticles($article){
        $this->articles[] = $article;
    }

    public function getArticles(){
        return $this->articles;
    }
}