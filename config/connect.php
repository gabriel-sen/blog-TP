<?php
$bdd = new PDO('mysql:host=localhost;dbname=blog_tp_opcr;charset=utf8', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);