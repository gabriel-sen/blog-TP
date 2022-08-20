<form method="POST" action="<?= URL; ?>commentSubmition">
        <div class="form-group mb-4">
            <h5>Vous allez commenter entant que : <?= $_SESSION['profil']['username'] ?></5>
          </div>
          
          <div class="form-group mb-4">
            <label for="email">Votre mail :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['profil']['login'] ?>" disabled="disabled">
          </div>

          <div class="form-group mb-4">
            <label for="message" >Votre message</label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder=" Votre message ici"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Envoyer votre message</button>
      </form>
      <a href="/blog-TP/articles" class="btn btn-primary">retourner aux articles</a>
</form>