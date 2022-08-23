<?php
//TODO: A mettre dans le controller
  require_once("src/controllers/UserController.php");
   function uuidGenerator($uniqueID = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $uniqueID = $uniqueID ?? random_bytes(16);
    assert(strlen($uniqueID) == 16);

    // Set version to 0100
    $uniqueID[6] = chr(ord($uniqueID[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $uniqueID[8] = chr(ord($uniqueID[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($uniqueID), 4));
}
  $myuuid = uuidGenerator();
?>
<form method="POST" action="<?= URL; ?>compte/commentSubmition">
        <div class="form-group mb-4">
            <h5>Vous allez commenter entant que : <?= $_SESSION['profil']['username'] ?></5>
          </div>
          
          <div class="form-group mb-4">
            <label for="email">Votre mail :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['profil']['login'] ?>" disabled="disabled">
          </div>
          <div class="form-group mb-4">
          <input type="hidden" name="commentId" value="<?php echo $myuuid;?>" >
          <input type="hidden" name="commentAuthor" value="<?=$_SESSION['profil']['user_id']?>" >
          <input type="hidden" name="commentDate" value="<?= date_default_timezone_set('Europe/Paris'); echo date('d-m-y h:i');?>" >
          </div>
          <div class="form-group mb-4">
            <label for="comTexte" >Votre message</label>
            <textarea class="form-control" id="message" name="comTexte" value="<?=$comment->getComTexte()?>" rows="3" placeholder=" Votre message ici"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Envoyer votre message</button>
      </form>
      <a href="/blog-TP/articles" class="btn btn-primary">retourner aux articles</a>
</form>