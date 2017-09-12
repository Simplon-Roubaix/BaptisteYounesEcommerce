<?php
session_start();
header("refresh:2;url=../index.php");
session_unset();
session_destroy();
$_POST["pseudo"] = "";
$_POST["user_password"]="";
?>
<link rel="stylesheet" href="../css/style.css">
<h1 id="titleDeco">Déconnexion en cours...</h1>
<div id="deconnexionPage">
 <div class="loader"></div>
</div>
