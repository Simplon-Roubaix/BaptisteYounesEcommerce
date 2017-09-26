<?php
session_start();
include('../model/modelPageUtilisateur.php');
$cheminPageUtilisateur = "controlPageUtilisateur.php";
$chemin_deco = "../index.php";
saisieSession();

if (isset($_POST['pseudo']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['prenom']) and isset($_POST['nom'])) {
  update($_POST['pseudo'],$_POST['password'],$_POST['email'], $_POST['prenom'],$_POST['nom']);
}


if (isset($_POST['titre']) and isset($_POST['resume']) and isset($_POST['texte']) and isset($_POST['auteur']) and isset($_POST['image'])) {
  ajoutImg($_POST['image']);
  ajoutProduit($_POST['titre'], $_POST['resume'], $_POST['texte'], $_POST['auteur']);
}

include('../vue/vuePageUtilisateur.php');
 ?>
