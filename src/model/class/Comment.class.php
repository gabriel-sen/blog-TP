<?php

class Comment{
    private $id;
    private $commentAuthor;
    private $commentTexte;
    private $commentDate;
    private $commentStatut;

    public function __construct($id,$commentAuthor,$commentTexte,$commentDate,$commentStatut){
        $this->id = $id;
        $this->author = $commentAuthor;
        $this->texte = $commentTexte;
        $this->date = $commentDate;
        $this->statut = $commentStatut;
    }

    public function getComId(){return $this->id;}
    public function setComId($id){$this->id = $id;}

    public function getComAuthor(){return $this->author;}
    public function setComAuthor($commentAuthor){$this->author = $commentAuthor;} 

    public function getComTexte(){return $this->texte;}
    public function setComTexte($commentTexte){$this->commentTexte = $commentTexte;}
    
    public function getComDate(){return $this->date;}
    public function setComDate($commentDate){$this->commentDate = $commentDate;}

    public function getComStatut(){return $this->statut;}
    public function setComStatut($commentStatut){$this->commentStatut = $commentStatut;}

}