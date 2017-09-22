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
  //connexion de l'utilisateur en comparant son pseudo et mot de passe
  $test_connexion = $bdd->query('SELECT pseudo,user_password FROM utilisateur where pseudo = "'.$pseudo.'"');
  while($donnees = $test_connexion->fetch()){
    $testPassword = password_verify($password, $donnees['user_password']);
    if ($testPassword == true) {
      $_SESSION['pseudo'] = $donnees['pseudo'];
      var_dump($_SESSION['pseudo']);
      header("Location:../index.php");
    }
    else{
      ?><script type="text/javascript">
      $(document).ready(function(){
        alert('essais raté');
      });
      </script>
      <?php
      header("Location:../index.php");
    }
  }
  ob_end_flush();
?>
