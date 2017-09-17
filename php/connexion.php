<?php session_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  $pseudo = $_POST['connexion_pseudo'];
  $password = $_POST['connexion_password'];

  $test_pseudo = $bdd->query('SELECT pseudo FROM utilisateur');
  $test_password = $bdd->query('SELECT user_password FROM utilisateur');
  while($donnees = $test_pseudo->fetch()){
    if ($test_pseudo == $pseudo){
      while ($donnees = $test_password->fetch()) {
        if ($test_password == $password) {
          $_SESSION['pseudo'] = $pseudo;
          echo 'connexion reussi';
        }
        else {
          echo 'le mot de passe est incorrect';
        }
      }
    }
    else {
      echo 'le pseudo est inconnu';
    }
  }
  header("refresh:2;location=../index.php");
 ?>
