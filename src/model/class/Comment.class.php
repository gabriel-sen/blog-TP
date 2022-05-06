<?php

class Comment{
    private $id;
    private $commentAuthor;
    private $commentTexte;
    private $commentDate;

    public function __construct($id,$commentAuthor,$commentTexte,$commentDate){
        $this->id = $id;
        $this->author = $commentAuthor;
        $this->texte = $commentTexte;
        $this->date = $commentDate;

    }

    public function getComId(){return $this->id;}
    public function setComId($id){$this->id = $id;}

    public function getComAuthor(){return $this->author;}
    public function setComAuthor($commentAuthor){$this->author = $commentAuthor;} 

    public function getComTexte(){return $this->texte;}
    public function setComTexte($commentTexte){$this->commentTexte = $commentTexte;}
    
    public function getComDate(){return $this->date;}
    public function setComDate($commentDate){$this->commentDate = $commentDate;}

}