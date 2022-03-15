<?php ob_start() ?>

  <?php
    require_once("class/Article.class.php");
    require_once("class/ArticleManager.class.php");
    $articleManager = new ArticleManager;
    $articleManager->chargeArticles();
  ?>
  <?php 
    $articles = $articleManager->getArticles();
    for($i=0; $i < count($articles); $i++): 
  ?>
    <div class="col-md-4">
      <div class="card">
      <img src="<?=$articles[$i]->getImage()?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?=$articles[$i]->getTitle()?></h5>
          <h6><?=$articles[$i]->getsubTitle() ?></h6>
          <p class="card-text"><?=$articles[$i]->getTexte()?></p>
          <div class="card_info">
            <p>Auteur : <?=$articles[$i]->getAuthor()?></p>
            <p>Article publié le : <?=$articles[$i]->GetCreationDate()?></p>
            <p>Article modifié le : <?=$articles[$i]->getModificationDate()?></p>
          </div>
          <a href="#" class="btn btn-primary">Lire l'article</a>
        </div>
      </div>
    </div>
  <?php endfor; ?>

<?php
  $titre="Tout les articles :";
  $content = ob_get_clean();
  require "template.php";
?>