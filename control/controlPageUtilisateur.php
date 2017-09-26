<?php
session_start();
include('../model/modelPageUtilisateur.php');
$cheminPageUtilisateur = "controlPageUtilisateur.php";
$chemin_deco = "../index.php";
saisieSession();
include('../vue/vuePageUtilisateur.php');
 ?>
