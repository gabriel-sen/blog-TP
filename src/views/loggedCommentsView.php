<?php
//TODO: A mettre dans le controller
  require_once("src/controllers/UserController.php");
?>
<form method="POST" action="<?= URL; ?>compte/commentSubmition">
        <div class="form-group mb-4">
            <h5>Vous allez commenter entant que : <?= $_SESSION['profil']['username']; ?></5>
          </div>
          <div class="form-group mb-4">
            <label for="email">Votre mail :</label>
            <input type="email" class="form-control" id="email" name="userShowMail" value="<?= $_SESSION['profil']['login']; ?>" disabled="disabled">
          </div>
          <div class="form-group mb-4">
          <input type="hidden" name="article_id" value="<?=$article->getId();?>" >
          <input type="hidden" name="comment_article_id" value="<?= $articleId;?>" >
          <input type="hidden" name="user_id" value="<?=$_SESSION['profil']['user_id'];?>" >
          <input type="hidden" name="comment_date" value="<?= date_default_timezone_set('Europe/Paris'); echo date('d-m-y h:i');?>" >
          </div>
          <div class="form-group mb-4">
            <label for="comTexte" >Votre message</label>
            <textarea class="form-control" id="message" name="comment_text" rows="3" placeholder=" Votre message ici"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Envoyer votre message</button>
      </form>
      <a href="/blog-TP/articles" class="btn btn-primary">retourner aux articles</a>
</form>