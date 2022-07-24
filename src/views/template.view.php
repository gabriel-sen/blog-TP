<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- DESIGN SYSTEM DE BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- STYLES CUSTOM -->
  <link rel="stylesheet" href="css/style.css ">
  <link rel="stylesheet" href="../css/style.css ">
  <!-- FONTAWESOME-->
  <link rel="stylesheet" href="css/fa/all.min.css ">
  <link rel="stylesheet" href="../css/fa/all.min.css ">
  <script src="https://kit.fontawesome.com/8298e03d11.js" crossorigin="anonymous"></script>
  
  <meta name="description" content="<?= $page_description; ?>">
  <title> <?= $titre ?> </title>
</head>
<body class="<?=$bodyClass?>">
<?php include('components/header.php'); ?>

<div class="container w-70 mx-auto">
  <div class="row">
    <?php 
        if(!empty($_SESSION['alert'])) {
            foreach($_SESSION['alert'] as $alert){
                echo "<div class='alert ". $alert['type'] ."' role='alert'>
                    ".$alert['message']."
                </div>";
            }
            unset($_SESSION['alert']);
        }
    ?>
    <h1> <?= $titre ?> </h1>
    <?= $content ?> 
  </div>
</div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>