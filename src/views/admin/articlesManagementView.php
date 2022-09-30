<?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");

  ?>
<?php 
    for($i=0; $i < count($articles); $i++): 
      /*if($articles[$i]->getStatus()===2){*/
  ?>
    
    <div class="card_articles col-md-4 container_articles">
      <div class="card">
        <?php
          if(empty($articles[$i]->getImage())){
            echo '<img src="'.$imgBase.'"class="card-img-top" alt="...">';
          }else {
            echo '<img src="'.$articles[$i]->getImage().'" class="card-img-top" alt="...">';
          }
        ?>
        <div class="card-body">
          <h5 class="card-title"><?=$articles[$i]->getTitle()?></h5>
          <p class="card-text"><?=$articles[$i]->getTexte()?></p>
      
          <div class="row">
            <div class="col">
              <h6>Auteur : </h6>
              <p><?=$articles[$i]->getUsername()?></p>
            </div>
            <div class="col">
              <h6>Article publié le :</h6> 
              <p><?=$articles[$i]->GetCreationDate()?></p>
            </div>
            <div class="col">
              <h6>Article modifié le :</h6> 
              <p><?=$articles[$i]->getModificationDate()?></p>
            </div>
          </div>
          <a href="../admin/adminValidateArticle" class="btn btn-success">valider l'article</a>
          <a href="articleContent/<?= $articles[$i]->getId() ?>" class="btn btn-primary">Lire l'article</a>
          <a href="../admin/adminDeletArticle" class="btn btn-danger">Supprimer l'article</a>
        </div>
      </div>
    </div>
<?php 
  /*}*/
  endfor; 
?>