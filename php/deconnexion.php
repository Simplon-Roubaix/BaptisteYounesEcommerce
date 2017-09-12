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
    <title>deco</title>
  </head>
  <body>
    <p id="deco">deconnexion en cours...</p>
  </body>
</html>
