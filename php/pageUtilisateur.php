<?php session_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  $info_utilisateur = $bdd->query('SELECT pseudo,user_password, user_img, email, prenom, nom FROM utilisateur where pseudo = "'.$_SESSION['pseudo'].'" ');
  while($donnees = $info_utilisateur->fetch()){
    $_SESSION['password'] = $donnees['user_password'];
    $_SESSION['user_img'] = $donnees['user_img'];
    $_SESSION['email'] = $donnees['email'];
    $_SESSION['prenom'] = $donnees['prenom'];
    $_SESSION['nom'] = $donnees['nom'];
    ?>
    <form action="pageUtilisateur_post.php" method="post">
      <label for="">pseudo</label>
      <input type="text" name="pseudo" value="<?php $_SESSION['pseudo'];?>"><br>
      <label for="">password</label>
      <input type="text" name="password" value="<?php $_SESSION['user_password'];?>"><br>
      <label for="">image profil</label>
      <input type="text" name="imageProfil" value="<?php $_SESSION['user_img']; ?>"><br>
      <label for="">email</label>
      <input type="text" name="prenom" value="<?php $_SESSION['prenom']; ?>"><br>
      <label for="">nom</label>
      <input type="text" name="nom" value="<?php $_SESSION['nom']; ?>"><br>
      <input type="submit" name="mettre à jour">
    </form>
    <?php
  } ?>
