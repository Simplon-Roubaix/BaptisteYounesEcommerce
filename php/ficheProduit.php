<?php
if ($connexion = true and isset($_SESSION['pseudo'])) {
  session_start();
}
try{
        $bdd = new PDO('mysql:host=localhost;dbname=exoSql;charset=utf8', 'root', 'root');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }
  ?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Fiche Produit</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="../favicon-2.ico">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <?php
      $chemin_deco = "deconnexion.php";
      include("header.php"); ?>
      <main>
        <?php if (!empty($_POST["selection"]) or $_POST["selection"] == 0) {
          ?>
          <script>console.log("test");</script>
          <section id="detailProduit">
            <img src="<?php echo $produit[$_POST["selection"]]["g_img"]; ?>" alt="">
            <p><?php echo $produit[$_POST["selection"]]['g_text']; ?></p><br>
            <a href="../index.php">retour au catalogue</a>
          </section>
          <?php
        } ?>
      </main>
      <?php include("footer.php") ?>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
      <script src="../js/plugins.js"></script>
      <script src="../js/main.js"></script>
      <!--<script src="../../bootstrap4/css/bootstrap.css"></script>
      <script src="../../bootstrap4/js/bootstrap.js"></script>-->
      <script src="../jquery-3.2.1.js">

      </script>

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
