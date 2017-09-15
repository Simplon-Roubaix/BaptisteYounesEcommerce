<?php
if ($connexion = true) {
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
        <title>site Duglandeur</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="favicon-2.ico">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="jquery-3.2.1.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <?php
        include("php/header.php");
      } ?>
      <main>
        <?php /*script prenand en compte les variable pseudo et code pour effacer le formulaire de départ, puis créer les fiches produit en lisant les tableaux associatifs */
          if (!empty($_POST['pseudo']) and !empty($_POST['user_password']) or !empty($_SESSION["pseudo"]) and !empty($_SESSION["code"]) ) {
            ?>

            <script>$(document).ready(function(){
                      $("#connection").remove();
                      });
                      console.log("passe ici");
            </script>
            <?php
              for($produit_en_cours = 0; $produit_en_cours < count($produit); $produit_en_cours++){
            ?>
                <section class="ficheProduit">
                  <img src="<?php echo $produit[$produit_en_cours]['p_img'];?>" alt="">
                  <p><?php echo $produit[$produit_en_cours]['p_text']; ?></p>
                  <form class="" action="php/ficheProduit.php" method="post">
                    <input class="inputCache" type="text" name="selection" value="<?php echo $produit_en_cours; ?>">
                    <input type="submit" class="savoir" value="+">
                  </form>
                </section>
                <?php
            }
          }
        ?>
        <!--formulaire statique pour acceder au site, disparais après utilisation-->
        <section id="connection">
          <h1>connectez vous pour accedez au site</h1>

        </section>
      </main>
      <?php include("php/footer.php"); ?>


        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

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
