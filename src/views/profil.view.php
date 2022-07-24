<section  id="img">
    <h4> Votre image de profil : </h4>
    <img src="../public/assets/images/<?= $userData['img']?>"class="image-profil" alt="Image du profile">

    <?php /*
      if(empty($article->getImage())){
        echo '<img src="'.$imgBase.'"class="image-article" alt="...">';
      }else {
        echo '<img src="'.$article->getImage().'" class="image-article" alt="...">';
      }
    */?>

    <form method="POST" action="<?= URL ?>compte/validationChangeProfileImage" enctype="multipart/form-data">
      <label for="changeImg">Changer l'image de profile :</label> <br>
      <input name="img" type="file" class="form-control-file" id="changeImg" onchange="submit();"/>
    </form>

</section >
<section  id="name">
    <form method="POST" action="<?= URL; ?>compte/validate_username_modification">
    <h4>
        <label for="username">Nom d'utilisateur  actuellement lmiée à votre compte :</label>
    </h4>
        <input type="text" class="form-control" name="username" value="<?= $userData['username'] ?>">
        <button class="btn btn-primary" type="submit">Changer de username</button>
    </form>
</section >
<section  id="mail">
    <h4>Votre e-mail :</h4>
    <?= $userData['email'] ?>
</section >
<section class="changePassword">
    <h4>zone de danger :</h4>
    <button id="btnDeletAccount" type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal">
        Supprimer mon compte
    </button>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Vous vous appretez à supprimer votre compte. </br>
        Cette modification est déffinitive conformément aux règles relatives au RGPD en vigueure dans l'union européeene. </br>
        Nous ne disposerons plus de vos données personnelles.</br></br>
        Souhaitez-vous supprimer votre compte ? </br>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non, je garde mon compte</button>
        <a class="btn btn-danger" href="<?= URL?>compte/deletAccount">Oui, je supprime mon compte.</a>
      </div>
    </div>
  </div>
</div>
</section >