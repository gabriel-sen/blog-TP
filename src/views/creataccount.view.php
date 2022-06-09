<form method="POST" action="validation_creationaccount">
  <div class="mb-10">
      <label for="name" class="form-label">Nom</label>
      <input type="text" class="form-control" id="name" aria-describedby="name" name="name" required>
    </div>
    <div class="mb-10">
      <label for="forename" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="forename" aria-describedby="forename" name="forename" required>
    </div>
  <div class="mb-10">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="login" required>
    </div>
    <div class="mb-12">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div id="emailHelp" class="form-text">Vos informations ne seront jamais transmis à un tiers.</div>
    <button type="submit" class="btn btn-primary">Créer le compte </button>
</form>