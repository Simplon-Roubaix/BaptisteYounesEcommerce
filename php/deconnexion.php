<?php
session_start();
ob_start();
session_unset();
session_destroy();
header("location:../index.php");
ob_end_flush();
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
  <!-- <?php  ?> -->
  </body>
</html>
