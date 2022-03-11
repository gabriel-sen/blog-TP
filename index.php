<?php ob_start() ?>
  
<h1>Ma page d'acceuil pour l'index dus ite </h1>

<?php
  $content = ob_get_clean();
  require "template.php";
?>