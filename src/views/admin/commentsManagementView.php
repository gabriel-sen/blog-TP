<?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");
  
  ?>

  <?php 
    for($i=0; $i < count($articles); $i++): 
  ?>
    <h2>Article n° <?php echo $i;?> : <?=$articles[$i]->getTitle()?></h2>
    <h6>Auteur : <?=$articles[$i]->getUsername()?> - Article publié le : <?=$articles[$i]->GetCreationDate()?></h6> 
    <a href="<?= URL; ?>articleContent/<?= $articles[$i]->getId() ?>" class="link">Lire l'article</a>
    <h2> Les commantaires : </h2>
    <?php 
      if($articles[$i]-> getComments() === []){
        echo  "<p> Cette article ne dispose pas de commantaires </p>";
      }
        foreach($articles[$i]-> getComments() as $comment){
          echo  "<h5> le commentaire  de ".$comment->getComAuthor() ."</h5>"
          ."<p>".$comment->getComTexte() ."</p>";
        }
        ?>
  <?php endfor;?>