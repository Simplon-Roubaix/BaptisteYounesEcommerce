<?php
include('model/modelIndex.php');

$selectionProduit = affichageProduit();

if (!isset($_POST['deco'])) {
  deconnexionUtilisateur();
}

if (isset($_POST['pseudo']) and isset($_POST['user_password']) and isset($_POST['src_profil']) and isset($_POST['mail_user']) and isset($_POST['prenom']) and isset($_POST['nom'])) {
  $pseudo = $_POST['pseudo'];
  $user_password = $_POST['user_password'];
  $src_profil = $_POST['src_profil'];
  $email = $_POST['mail_user'];
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  function ajoutUtilisateur($pseudo, $user_password, $src_profil, $email, $prenom, $nom);
}

include('vue/vueIndex.php'); ?>
