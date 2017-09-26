<?php
session_start();
include('../model/modelPageUtilisateur.php');
$cheminPageUtilisateur = "controlPageUtilisateur.php";
$chemin_deco = "../index.php";
saisieSession();

if (isset($_POST['titre']) and isset($_POST['resume']) and isset($_POST['texte']) and isset($_POST['auteur']) and isset($_POST['image'])) {
  ajoutImg($_POST['image']);
  ajoutProduit($_POST['titre'], $_POST['resume'], $_POST['texte'], $_POST['auteur']);
}

include('../vue/vuePageUtilisateur.php');
 ?>
