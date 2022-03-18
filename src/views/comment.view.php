<?php ob_start() ?>

  <?php
    require_once("src/model/class/Comment.class.php");
    require_once("src/model/CommentManager.class.php");

  ?>

  <?php 
    for($i=0; $i < count($comment); $i++):
  ?>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h6>Commentaire : </h6>
          <p class="card-text"><?=$comment[$i]->getComTexte()?></p>
          <div class="card_info">
            <p>Auteur : <?=$comment[$i]->getComAuthor()?></p>
            <p>Article publié le : <?=$comment[$i]->getComTexte()?></p>

          </div>
          <a href="#" class="btn btn-primary">Lire l'article</a>
        </div>
      </div>
    </div>
  <?php endfor; ?>

<?php
  $titre="Tout les articles :";
  $content = ob_get_clean();
  require "template.view.php";
?>