<?php ob_start() ?>

  <?php
    require_once('model/functions.php');
    $articles = getArticles();
  ?>



  <?php foreach($articles as $article): ?>
    <h2>
      <?= $article->article_title ?>
    </h2>
    <p>
    <?= $article->article_content ?>
    <ul>
      <li>Article publié le : <?= $article->article_date ?></li>
      <li>Auteur : <?= $article->username ?></li>
    </ul>
    </p>
  <?php endforeach; ?>

<?php
  $titre="Tout les articles :";
  $content = ob_get_clean();
  require "template.php";
?>