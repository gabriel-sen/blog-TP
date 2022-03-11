<?php ob_start() ?>

  <?php
    require_once('model/functions.php');
    $articles = getArticles();
  ?>
<h1>Liste des articles </h1>



<?php foreach($articles as $article): ?>
  <h2>
    <?= $article->title ?>
  </h2>
  <a href="article.php?id=<?= $article->id ?>">
    Lire la suite de l'article
  </a>
<?php endforeach; ?>

<?php
  $content = ob_get_clean();
  require "template.php";
?>