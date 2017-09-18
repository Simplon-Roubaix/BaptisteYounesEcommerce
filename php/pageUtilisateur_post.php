<?php session_start();
ob_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  $info_utilisateur = $bdd -> prepare('UPDATE utilisateur(pseudo, user_password, email, prenom, nom) VALUES (:pseudo, :user_password, :email, :prenom, :nom) where pseudo = "'.$_SESSION['pseudo'].'" ');
  $info_utilisateur->execute(array(
        'pseudo'=>$_POST['pseudo'],
        'user_password'=>$_POST['password'],
        'email'=>$_POST['email'],
        'prenom'=>$_POST['prenom'],
        'nom'=>$_POST['nom']
      ));
  $_SESSION['pseudo'] = $_POST['pseudo'];
  // $info_utilisateur = $bdd->query('UPDATE utilisateur set pseudo = "'.$_POST['pseudo'].'",
  // user_password = "'.$_POST['password'].'",
  // email = "'.$_POST['email'].'",
  // prenom = "'.$_POST['prenom'].'",
  // nom = "'.$_POST['password'].'" WHERE pseudo = "'.$_SESSION['pseudo'].'" ');
  header("Location:pageUtilisateur.php");
  ob_end_flush();
 ?>
