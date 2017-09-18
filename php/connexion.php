<?php
session_start();
ob_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  $pseudo = $_POST['connexion_pseudo'];
  var_dump($pseudo);
  $password = $_POST['connexion_password'];
  var_dump($password);
  $test_connexion = $bdd->query('SELECT pseudo,user_password FROM utilisateur where pseudo = "'.$pseudo.'" ');
  while($donnees = $test_connexion->fetch()){
    if ($donnees['pseudo'] == $pseudo and $donnees['user_password'] == $password) {
      $_SESSION['pseudo'] = $donnees['pseudo'];
      var_dump($_SESSION['pseudo']);
      header("Location:../index.php");
    }
    else{

      header("Location:../index.php");
    }
  }
  header("Location:../index.php");
  ob_end_flush();
?>
