<h1> </h1>

<form method="POST" action="<?= URL ?>compte/validation_modificationPassword">
  <div class="mb-10">
      <label for="oldPassword" class="form-label">Ancien password</label>
      <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
    </div>
    <div class="mb-12">
      <label for="newPassword" class="form-label">Nouveau Password</label>
      <input type="password" class="form-control" id="newPassword" name="newPassword" required>
    </div>
    <div class="mb-12">
      <label for="newPasswordConfirmation" class="form-label">Confirmez votre nouveau Password</label>
      <input type="password" class="form-control" id="newPasswordConfirmation" name="newPasswordConfirmation" required>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>