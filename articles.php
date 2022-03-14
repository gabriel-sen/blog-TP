<?php ob_start() ?>

  <?php
    require_once('model/functions.php');
    $articles = getArticles();


    require_once("class/Article.class.php");
    $article1 = new Article(
        "1",
        "https://th.bing.com/th/id/R.94c0a4d7d4c7fd8db7dbf63d0d6746a4?rik=2Z6OFc2apWD5TQ&pid=ImgRaw&r=0",
        "Bonjour",
        "ceci est le titre",
        "ceci est un sous titre",
        "ceci est un texte plus ou moins long ca dépreds ",
        "Jean",
        "06/07/1989",
        "06/07/2022",
      );
    $article2 = new Article(
      "2",
      "https://th.bing.com/th/id/R.94c0a4d7d4c7fd8db7dbf63d0d6746a4?rik=2Z6OFc2apWD5TQ&pid=ImgRaw&r=0",
      "Bonjour",
      "ceci est le titre",
      "ceci est un sous titre",
      "ceci est un texte plus ou moins long ca dépreds ",
      "Jean",
      "06/07/1989",
      "06/07/2022",
    );
    $article3 = new Article(
        "3",
        "https://th.bing.com/th/id/R.94c0a4d7d4c7fd8db7dbf63d0d6746a4?rik=2Z6OFc2apWD5TQ&pid=ImgRaw&r=0",
        "Bonjour",
        "ceci est le titre",
        "ceci est un sous titre",
        "ceci est un texte plus ou moins long ca dépreds ",
        "Jean",
        "06/07/1989",
        "06/07/2022",
      );
    $article4 = new Article(
      "4",
      "https://th.bing.com/th/id/R.94c0a4d7d4c7fd8db7dbf63d0d6746a4?rik=2Z6OFc2apWD5TQ&pid=ImgRaw&r=0",
      "Bonjour",
      "ceci est le titre",
      "ceci est un sous titre",
      "ceci est un texte plus ou moins long ca dépreds ",
      "Jean",
      "06/07/1989",
      "06/07/2022",
    );
    
    
    
    $articles = [$article1,$article2,$article3,$article4];

  ?>

  <?php for($i=0; $i <count($articles); $i++): ?>
    <div class="col-md-4">
      <div class="card">
      <img src="<?=$articles[$i]->getImage()?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?=$articles[$i]->getTitle()?></h5>
          <h6><?=$articles[$i]->getsubTitle() ?></h6>
          <p class="card-text"><?=$articles[$i]->getTexte()?></p>
          <div class="card_info">
            <p>Auteur : <?=$articles[$i]->getAuthor()?></>
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