<?php
session_start();
header("refresh:2;url=../index.php");
session_unset();
session_destroy();
$_POST["pseudo"] = "";
$_POST["user_password"]="";
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>deco</title>
  </head>
  <body>
    <h1 id="titleDeco">Déconnexion en cours...</h1>
    <div id="deconnexionPage">
     <div class="loader"></div>
    </div>
  </body>
</html>
