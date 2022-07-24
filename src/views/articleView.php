
  <?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");
    require_once "src/model/class/Article.class.php";

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


        <h2> Les commantaires : <p></h2>
        <?php 
          echo "<div class='comment-container'>" ;
          foreach($article-> getComments() as $comment){
            echo  "<h5> le commentaire  de ".$comment->getComAuthor() ."</h5>"
            ."<p>".$comment->getComTexte() ."</p>";
            
          }
          echo  "</div>"
        ?>
      </div>
      <a href="/blog-TP/articles" class="btn btn-primary">retourner aux articles</a>
  </section>
<?php
  $titre= $article->getTitle();
?>