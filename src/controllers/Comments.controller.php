<?php
require_once "src/model/CommentManager.class.php";

class CommentsController{
    private $commentManager; // 4) Cette instance est disponnible dans l'attribut Private

    public function __construct(){ // 1) au moment de la construction
        $this->commentManager = new CommentsManager; // 2) J'instantie un nouvel article depuis son objet
        $this->commentManager->chargeComment(); // 3) J'y charge les données de la BD
    }

    public function afficherComment(){
        $comment = $this->commentManager->getComments(); // 5) Je récupère tout mes articles que je stock dans ma variable .
        require "src/views/comment.view.php"; // 6) qui est affiché dans ma vue
    }
}