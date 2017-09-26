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
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
  </head>
  <body>
    <section id="sectionMiseAJour">
      <form id="miseAJour" action="../control/controlPageUtilisateur.php" method="post">
        <label for="">pseudo</label>
        <input type="text" name="pseudo" value="<?php echo $_SESSION['pseudo'];?>"><br>

        <label for="">password</label>
        <input type="text" name="password" value="<?php echo $_SESSION['password'];?>"><br>

        <label for="">email</label>
        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"><br>

        <label for="">prenom</label>
        <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>"><br>

        <label for="">nom</label>
        <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>"><br>
        <section>
          <input type="submit" name="mettre à jour">
          <a href="../index.php">retour à l'index</a>
        </section>

      </form>

      <form id="ajoutProduit" action="../control/controlPageUtilisateur.php" method="post" enctype="multipart/form-data">
        <label for="">titre</label>
        <input type="text" name="titre" value=""><br>
        <label for="">resume</label>
        <input type="text" name="resume" value=""><br>
        <label for="">texte</label>
        <input type="text" name="texte" value=""><br>
        <label for="">auteur</label>
        <input type="text" name="auteur" value=""><br>
        <label for="">ajouter image</label>
        <input type="file" name="image" value="">
        <input type="submit" value="envoyer">
      </form>
    </section>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
  </body>
</html>
