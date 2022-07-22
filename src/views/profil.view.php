<div id="img">
    <h4> Votre image de profil : </h4>
    <img src="<?= $userData['img'] ?>" alt="">
</div>
<div id="name">
    <form method="POST" action="<?= URL; ?>compte/validate_username_modification">
    <h4>
        <label for="username">Nom d'utilisateur  actuellement lmiée à votre compte :</label>
    </h4>
        <input type="text" class="form-control" name="username" value="<?= $userData['username'] ?>">
        <button class="btn btn-primary" type="submit">Changer de username</button>
    </form>
</div>
<div id="mail">
    <h4>Votre e-mail :</h4>
    <?= $userData['email'] ?>
</div>
<div>
    <h4>Changer votre mot de passe :</h4>
    <a href="<?= URL; ?>compte/changePassword" class="btn btn-primary">Changer le mot de passe</a>
</div>