<?php ob_start() ?>
  

<?php
  $titre="Titre de ma homepage";
  $content = ob_get_clean();
  require "template.php";
?>