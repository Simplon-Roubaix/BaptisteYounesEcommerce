<?php
  session_start();
  $chemin_deco = 'php/deconnexion.php';

try{
        $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
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
      ?>
      <main>
            <?php
            if (isset($_SESSION['pseudo'])) {?>
              <script type="text/javascript">
                $(document).ready(function(){
                  $('#creationProduit').hide();
                });
              </script><?php
            }
            ?>
              <form id="creationProduit" action="index.php" method="post">

              </form>
              <?php
            $reponse = $bdd->query('SELECT article.id as id,
              titre, resume, auteur, date_post
              FROM article inner join image
              on article.id = image.id');
            while($donnees = $reponse->fetch()){
            ?>
                <section class="ficheProduit">
                  <img src="<?php echo $donnees['src_img'];?>" alt="<?php echo $donnees['alt'];?>">
                  <h2><?php echo $donnees['titre']; ?></h2>
                  <p><?php echo $donnees['resume']; ?></p>
                  <form class="" action="php/ficheProduit.php" method="post">
                    <input class="inputCache" type="text" name="selection" value="<?php echo $donnees['id']; ?>">
                    <input type="submit" class="savoir" value="+">
                  </form>
                </section>
                <?php
            }

        ?>
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
