<?php

class Article{
    private $id;
    private $image;
    private $title;
    private $subTitle;
    private $texte;
    private $author;
    private $creationDate;
    private $modificationDate;
    private $username;

    public function __construct($id,$author,$image,$title,$subTitle,$texte,$creationDate,$modificationDate,$username){
        $this->id = $id;
        $this->author = $author;
        $this->image = $image;
        $this->title = $title;
        $this->subtitle = $subTitle;
        $this->texte = $texte;
        $this->creationDate = $creationDate;
        $this->modificationDate = $modificationDate;
        $this->username = $username;

    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getAuthor(){return $this->author;}
    public function setAuthor($author){$this->author = $author;} 

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}
    
    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getSubTitle(){return $this->subTitle;}
    public function setSubTitle($subTitle){$this->subTitle = $subTitle;}
    
    public function getTexte(){return $this->texte;}
    public function setTexte($texte){$this->texte = $texte;}

    public function GetCreationDate(){return $this->creationDate;}
    public function setCreationDate($creationDate){$this->creationDate = $creationDate;}
           
    public function getModificationDate(){return $this->modificationDate;}
    public function setModificationDate($modificationDate){$this->modificationDate = $modificationDate;}

    public function getUsername(){return $this->username;}
    public function setUsername($username){$this->username = $username;}

}