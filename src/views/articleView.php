
  <?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");
    //require_once "src/model/class/Article.class.php";

    require_once("src/model/class/Comment.class.php");
    require_once("src/model/CommentManager.php");
  ?>
  <section class="article">
    <div class="image-article-container">
    <?php
      if(empty($article->getImage())){
        echo '<img src="'.$imgBase.'"class="image-article" alt="...">';
      }else {
        echo '<img src="'.$article->getImage().'" class="image-article" alt="...">';
      }
    ?>
    </div>
    <div class="container_articles">
      <h2 class="title-article"><?=$article->getSubTitle()?></h2>
      <p class="article-text"><?=$article->getTexte()?></p>
      <div class="article_info">
        <div class="row">
          <div class="col">
            <h5>Auteur : </h5>
            <p> <i class="fa-solid fa-user"></i> <?=$article->getUsername()?></p>
          </div>
          <div class="col">
            <h5>Article publié le :</h5> 
            <p> <i class="fa-solid fa-calendar"></i> <?=$article->GetCreationDate()?></p>
          </div>
          <div class="col">
            <h5>Article modifié le :</h5> 
            <p> <i class="fa-solid fa-pen-to-square"></i> <?=$article->getModificationDate()?></p>
          </div>
        </div>

        <h2> Les commantaires : </h2>
        <?php 
          if($article-> getComments() === []){
            echo  "<p> Cette article ne dispose pas de commantaires </p>";
          }
            foreach($article-> getComments() as $comment){
              echo  "<h5> le commentaire  de ".$comment->getComAuthor() ."</h5>"
              ."<p>".$comment->getComTexte() ."</p>";
            }
        ?>
      </div>
      <?php if(Security::isLogged()): ?>
        <?php include('loggedCommentsView.php'); ?>
      <?php endif ; ?>
      <?php if(!Security::islogged()): ?>
        <h4>Pour commenter, veuillez : </h4>
        <a href="<?= URL; ?>login" target="_blank"> Vous connécter</a>
        <p> ou sinon : </p>
        <a href="<?= URL; ?>creataccount" target="_blank"> Créer unc ompte</a>
      <?php endif ; ?>

  </section>
<?php
  $titre= $article->getTitle();
?>