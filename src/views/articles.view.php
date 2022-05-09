  <?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");

  ?>
  <?php 
    for($i=0; $i < count($articles); $i++): 
  ?>
    <div class="card_articles col-md-4 container_articles">
      <div class="card">
        <img class="card-img-top" src="<?=$articles[$i]->getImage()?>" alt="Card image cap">
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
          <a href="articleContent/<?= $articles[$i]->getId() ?>" class="btn btn-primary">Lire l'article</a>
        </div>
      </div>
    </div>
  <?php endfor; ?>