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
  <form id="inscription" action="index.php" method="post">
      <label for="">Entrez un pseudo</label>
      <input type="text" name="pseudo" value=""><br>

      <label for="">entrez un mot de passe</label>
      <input type="password" name="user_password" value=""><br>

      <label for="">retapez le mot de passe</label>
      <input type="password" name="validation_password" value=""><br>

      <label for="">image Profil</label>
      <input type="text" name="src_profil" value=""><br>

      <label for="">mail</label>
      <input type="text" name="mail_user" value=""><br>

      <label for="">prenom</label>
      <input type="text" name="prenom" value=""><br>

      <label for="">nom</label>
      <input type="text" name="nom" value=""><br>

      <input type="submit" name="valider">
  </form>
</footer>
