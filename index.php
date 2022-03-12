<?php ob_start() ?>
  

<?php
  $titre="Login";
  $content = ob_get_clean();
  require "template.php";
?>