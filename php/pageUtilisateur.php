<?php session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ma Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="favicon-2.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../jquery-3.2.1.js"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  </head>
  <body>
    <?php
    include('header.php');
    ob_start();
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
        $_SESSION['email'] = $donnees['email'] ;
        $_SESSION['prenom'] = $donnees['prenom'];
        $_SESSION['nom'] = $donnees['nom'];
        ?>
        <section id="sectionMiseAJour">
          <form id="miseAJour" action="pageUtilisateur_post.php" method="post">
            <label for="">pseudo</label>
            <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo'];?>"><br>

            <label for="">password</label>
            <input type="text" name="password" value="<?php echo $_SESSION['password'];?>"><br>

            <label for="">email</label>
            <input type="text" name="email" value="<?php echo $donnees['email']; ?>"><br>

            <label for="">prenom</label>
            <input type="text" name="prenom" value="<?php echo $donnees['prenom']; ?>"><br>

            <label for="">nom</label>
            <input type="text" name="nom" value="<?php echo $donnees['nom']; ?>"><br>
            <section>
              <input type="submit" name="mettre à jour">
              <a href="../index.php">retour à l'index</a>
            </section>

          </form>
        </section>
        <?php
      }
      ob_end_flush();
      include('footer.php')
       ?>
  </body>
</html>
