<?php ob_start() ?>

  <?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");
    require_once "src/model/class/Article.class.php";

    require_once("src/model/class/Comment.class.php");
    require_once("src/model/CommentManager.php");
    
  ?>

  <div class="container container_articles">


    <div class="card_articles">
    <img src="<?=$article->getImage()?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?=$article->getTitle()?></h5>
        <h6><?=$article->getsubTitle() ?></h6>
        <p class="card-text"><?=$article->getTexte()?></p>
        <div class="card_info">
          <p>Auteur : <?=$article->getAuthor()?></p>
          <p>Article publié le : <?=$article->GetCreationDate()?></p>
          <p>Article modifié le : <?=$article->getModificationDate()?></p>
        </div>
        <a href="/blog-TP/articles" class="btn btn-primary">retourner aux articles</a>
      </div>
    </div>
  
  </div>
<?php
  $titre="Tout les articles :";
  $content = ob_get_clean();
  require "template.view.php";
?>