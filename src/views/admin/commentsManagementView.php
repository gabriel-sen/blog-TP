<?php
    require_once("src/model/class/Article.class.php");
    require_once("src/model/ArticlesManager.php");
  
  ?>

  <?php 
    for($i=0; $i < count($articles); $i++): 
  ?>
    <h4>Article n° <?php echo $i;?> : <?=$articles[$i]->getTitle()?></h4>
    <!--<h6>Auteur : <?=$articles[$i]->getUsername()?> - Article publié le : <?=$articles[$i]->GetCreationDate()?></h6> -->
    <a href="<?= URL; ?>articleContent/<?= $articles[$i]->getId() ?>" class="link">Lire l'article</a>
    <h5> Les commantaires de l'article : </h5>
    <div class="admin_comment_flex-container">
      <?php 
        if($articles[$i]-> getComments() === []){
          echo  "<p> Cette article ne dispose pas de commantaires </p>";
        }
          foreach($articles[$i]-> getComments() as $comment){
            if($comment->getComStatut() == 0){//COMMENTAIRE A STATUER
              echo '<div class="comment_container comment_containe_determinate">';
                echo  "<h5> Statut : <span class='status_determinate'>A statuer</span></h5>";
                echo  "<h6> le commentaire  de ".$comment->getComAuthor() ."</h6>"
                ."<p>".$comment->getComTexte() ."</p>";
                echo '<div class="admin_button_container">';
                  // Suprimer le commentaire 
                  echo '<form method="POST" action="'.str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]).'admin/adminDeletComment">';
                    echo '<input type="hidden" name="com_id" value="'.$comment->getComId().'" />';
                    echo '<button class="btn btn-danger" type="submit">supprimer le commentaire </button>';
                  echo'</form>';
                  // Valider  le commentaire 
                  echo '<form method="POST" action="'.str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]).'admin/adminValidateComment">';
                    echo '<input type="hidden" name="com_id" value="'.$comment->getComId().'" />';
                    echo '<button class="btn btn-success" type="submit">valider le commentaire </button>';
                  echo'</form>';
                echo '</div>';
              echo '</div>';
            }elseif($comment->getComStatut() == 1){//AFFICHER COMMENTAIRE SUPPRIMEE
              echo '<div class="comment_container comment_containe_deleted">';
              echo  "<h5> Statut : <span class='status_deleted'>supprimé</span></h5>";
                echo  "<h6> le commentaire  de ".$comment->getComAuthor() ."</h6>"
                ."<p>".$comment->getComTexte() ."</p>";
                echo '<div class="admin_button_container">';
                  // Valider  le commentaire 
                  echo '<form method="POST" action="'.str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]).'admin/adminValidateComment">';
                    echo '<input type="hidden" name="com_id" value="'.$comment->getComId().'" />';
                    echo '<button class="btn btn-success" type="submit">valider le commentaire </button>';
                  echo'</form>';
                echo '</div>';
              echo '</div>';
            }elseif($comment->getComStatut() == 2){//AFFICHER COMMENTAIRE VALIDEE
              echo '<div class="comment_container comment_containe_validated">';
              echo  "<h5> Statut : <span class='status_validated'>publiée</span></h5>";
                echo  "<h6> le commentaire  de ".$comment->getComAuthor() ."</h6>"
                ."<p>".$comment->getComTexte() ."</p>";
                echo '<div class="admin_button_container">';
                  // Suprimer le commentaire 
                  echo '<form method="POST" action="'.str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]).'admin/adminDeletComment">';
                    echo '<input type="hidden" name="com_id" value="'.$comment->getComId().'" />';
                    echo '<button class="btn btn-danger" type="submit">supprimer le commentaire </button>';
                  echo'</form>';
                echo '</div>';
              echo '</div>';
            }
          }
        ?>
    </div>
  <?php endfor;?>

