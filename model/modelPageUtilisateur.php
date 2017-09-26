<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  function saisieSession(){
    global $bdd;
    $info_utilisateur = $bdd->query('SELECT pseudo,user_password, user_img, email, prenom, nom FROM utilisateur where pseudo = "'.$_SESSION['pseudo'].'" ');
    $donnees = $info_utilisateur->fetch();
      $_SESSION['password'] = $donnees['user_password'];
      $_SESSION['email'] = $donnees['email'] ;
      $_SESSION['prenom'] = $donnees['prenom'];
      $_SESSION['nom'] = $donnees['nom'];
  }

  function update($pseudo,$password,$email,$prenom, $nom){
    global $bdd;
    $info_utilisateur = $bdd->query('UPDATE utilisateur set pseudo = "'.$_POST['pseudo'].'",
    user_password = "'.$_POST['password'].'",
    email = "'.$_POST['email'].'",
    prenom = "'.$_POST['prenom'].'",
    nom = "'.$_POST['nom'].'" WHERE pseudo = "'.$_SESSION['pseudo'].'" ');
    $_SESSION['pseudo'] = $_POST['pseudo'];
  }
 ?>
