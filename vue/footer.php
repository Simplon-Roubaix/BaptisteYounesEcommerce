<?php try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
$infoSite = $bdd->query('SELECT titre_footer, createur1, createur2 from info_site');
$donnees = $infoSite->fetch(); ?>

<footer>
  <h2><?php echo $donnees['titre_footer']; ?></h2>
  <section>
    <p>fait par <?php echo $donnees['createur1']; ?> </p>
  </section>
</footer>
