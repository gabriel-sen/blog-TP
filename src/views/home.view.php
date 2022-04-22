<?php ob_start() ?>
  
<!-- 
une photo et/ou un logo ;


un formulaire de contact (à la soumission de ce formulaire, un e-mail avec toutes ces informations vous sera envoyé) avec les champs suivants :

un lien vers votre CV au format PDF ;
et l’ensemble des liens vers les réseaux sociaux où l’on peut vous suivre (GitHub, LinkedIn, Twitter…).
-->

  <div class="mb-10">
    <img src="" alt="">
    <h2>Blog de Gabriel SEN</h2>
    <p>Le développeur qu'il vous faut</p>

    <form>
        <legend class="mb-4">Exemple de formulaire Bootstrap</legend>
        
        <div class="form-group mb-4">
          <label for="name">Entrez votre nom/ Prénom</label>
          <input type="text" class="form-control" id="name" placeholder=" Exemple : Jean Dupont">
        </div>
        
        <div class="form-group mb-4">
          <label for="email">Entrez votre mail</label>
          <input type="email" class="form-control" id="email" placeholder=" Exemple : JeanDupont@edhec.com">
        </div>

        <div class="form-group mb-4">
          <label for="message" >Votre message</label>
          <textarea class="form-control" id="message" rows="3" placeholder=" Votre message ici"></textarea>
        </div>
      <button type="submit" class="btn btn-primary">Envoyer votre message</button>
    </form>

  </div>

<?php
  $bodyClass = "home";
  $titre="Blog de Gabriel SEN";
  $content = ob_get_clean();
  require "template.view.php";
?>