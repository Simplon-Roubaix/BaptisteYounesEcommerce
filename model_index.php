<?php
session_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

function affichageProduit(){
  $selectionProduit = $bdd->query('SELECT article.id as id, src_img, alt, titre, resume, auteur, date_post
  FROM article inner join image
  on article.id = image.id');
}

function ajoutProduit($pseudo, $resume, $texte, $auteur){
  $ajoutProduit = $bdd->prepare('INSERT into article(titre, resume, texte, auteur, now()) values (:titre, :resume, :texte, :auteur)');
  $ajoutProduit->execute(array(
    'titre'=>$titre,
    'resume'=>$resume,
    'texte'=>$texte,
    'auteur'=>$auteur
  ));
}

function ajoutUtilisateur($pseudo, $user_password, $src_profil, $email, $prenom, $nom){
  $req = $bdd->prepare('INSERT INTO utilisateur(pseudo, user_password, user_img, email, prenom, nom) VALUES (:pseudo, :user_password, :user_img, :email, :prenom, :nom)');
  $req->execute(array(
    'pseudo'=>$pseudo,
    'user_password'=>password_hash($user_password, PASSWORD_DEFAULT),
    'user_img'=>$src_profil,
    'email'=> $email,
    'prenom' => $prenom,
    'nom' => $nom
  ));
  $_SESSION['pseudo'] = $pseudo;
}

function connexionUtilisateur($pseudo, $password){
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
}

function deconnexionUtilisateur(){
  session_unset();
  session_destroy();
}

function miseAJourUtilisateur($pseudo, $password,
$email,$prenom,$nom){
  $info_utilisateur = $bdd->query('UPDATE utilisateur set pseudo = "'.$pseudo.'",
  user_password = "'.$password.'",
  email = "'.$email.'",
  prenom = "'.$prenom.'",
  nom = "'.$nom.'" WHERE pseudo = "'.$_SESSION['pseudo'].'" ');
  $_SESSION['pseudo'] = $pseudo;
  header("Location:../index.php");
  ob_end_flush();
} ?>
