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
    

    public function __construct($id,$image,$title,$subTitle,$texte,$author,$creationDate,$modificationDate){
        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->subtitle = $subTitle;
        $this->texte = $texte;
        $this->author = $author;
        $this->reationDate = $creationDate;
        $this->modificationDate = $modificationDate;
        
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}
    
    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getSubTitle(){return $this->subTitle;}
    public function setSubTitle($subTitle){$this->subTitle = $subTitle;}
    
    public function getTexte(){return $this->texte;}
    public function setTexte($texte){$this->texte = $texte;}
    
    public function getAuthor(){return $this->author;}
    public function setAuthor(){$this->author = $author;} 

    public function GetCreationDate(){return $this->author;}
    public function setCreationDate(){$this->creationDate = $creationDate;}
           
    public function getModificationDate(){return $this->modificationDate;}
    public function setModificationDate(){$this->modificationDate = $modificationDate;}

}