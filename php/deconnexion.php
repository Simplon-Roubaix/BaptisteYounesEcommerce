<?php
session_start();
header("refresh:2;url=../index.php");
session_unset();
session_destroy();
$_POST["pseudo"] = "";
$_POST["user_password"]="";
?>
<p>deconnexion en cours...</p>
