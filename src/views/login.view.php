<form method="POST" action="validation_login">

  <div class="mb-10">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="login" required>
      <div id="emailHelp" class="form-text">Vos informations ne seront jamais transmis à un tiers.</div>
    </div>
    <div class="mb-12">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>