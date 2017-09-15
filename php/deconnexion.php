<?php
session_start();
session_unset();
session_destroy();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>deco</title>
  </head>
  <body>
    <h1 id="titleDeco">Déconnexion en cours...</h1>
    <div id="deconnexionPage">
     <div class="loader"></div>
    </div>
  <?php  header("Location:../index.php");?>
  </body>
</html>
