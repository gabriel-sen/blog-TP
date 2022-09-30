  <?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");
    require_once("src/controllers/UserController.php");
  ?>
<?php if(Security::isLogged()): ?>
  <section>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAddArticle">
      Ajouter un article
    </button>
    <br><br>
  </section>
<!-- début modal -->
  <div class="modal fade" id="ModalAddArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Ajouter un article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">  
          <div class="add_aricle_wrapper">
            <form action="<?= URL ?>compte/addArticle" method="post" enctype="multipart/form-data">
              <!--L'id de l'article  -->
              <input type="hidden" name="article_id" value="<?php echo $myuuid; ?>">
              <!--Ajouter une Titre-->
              <div class="form-group">
                <label for="article_title">Titre de l'article : </label>
                <input class="form-control" type="text" name="article_title">
              </div>
              <!--Ajouter une SubTitre-->
              <div class="form-group">
                <label for="article_subtitle">Sous-titre de l'article : </label>
                <input class="form-control" type="text" name="article_subtitle">
              </div>
              <!--Ajouter une image-->
              <div class="form-group">
                <label for="article_image">Ajoutez une image à votre article :</label> 
                <input class="form-control" name="article_image" type="file" class="form-control-file" id="article_image"/>
              </div>
              <!--Ajouter une description-->
              <div class="form-group">
                <label for="article_content">Ecrivez votre texte : </label>
                <textarea class="form-control" id="story" name="article_content"></textarea>
              </div>
              <!--Ajouter un autheur-->
              <div class="form-group">
                <input class="form-control" type="hidden" type="text" name="article_author_id" value="<?=$_SESSION['profil']['user_id'];?>">
              </div>
              <!--Ajouter une date de publication -->
              <input type="hidden" name="article_date_creation" value="<?php echo date('Y-m-d');?>">
              <!--Ajouter une date de modification -->
              <input type="hidden" name="article_date_modification" value="<?php echo date('Y-m-d');?>">
              <!--Ajouter un status -->
              <input type="hidden" name="article_statut" value="0">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Publier l'article</button>
          </div>
        </div>
      </form> <!-- fin du formulaire -->
    </div>
  </div>
  <!-- fin modal -->
<?php endif ; ?>
  <?php 
    for($i=0; $i < count($articles); $i++): 
      //echo $articles[$i]->getStatus()
    if($articles[$i]->getStatus() == 2){
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
          <a href="articleContent/<?= $articles[$i]->getId() ?>" class="btn btn-primary">Lire l'article</a>
        </div>
      </div>
    </div>
  <?php 
    }
    endfor;
  ?>