<header>
  <section id="espaceUtilisateur">
    <?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }
    $infoSite = $bdd->query('SELECT titre from info_site');
    $donnees = $infoSite->fetch();
    if (!isset($_SESSION['pseudo'])) {
      ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#decoButton').hide();
          $('#bienvenu').hide();
          $('#creationUser').show();
          $('#connexionUser').show();
          $('#espaceAdmin').hide();
        });
        console.log('bouton deco effacer');
      </script>
      <?php
    } ?>

    <!--formulaire pour se deconnecter, apparais seulement lorsque l'utilisateur est connecter-->
    <form id='decoButton' action="index.php" method="post">
      <input style='display:none;' type="text" name="deco" value="">
      <input type="submit" value="Déconnexion" />
    </form>

    <!--formulaire permettant de s'inscrire-->
    <form id="creationUser" action="../php/creationUser.php" method="post">
      <input type="submit" value="s'inscrire">
    </form>

    <!--formulaire pour se connecter lorsque l'utilisateur s'est inscrit préalablement-->
    <form id="connexionUser" action="index.php" method="post">
      <label for="">pseudo</label>
      <input id='connexionPseudo' type="text" name="connexion_pseudo" value=""><br>
      <label for="">password</label>
      <input id='connexionPassword' type="password" name="connexion_password" value=""><br>
      <input type="submit" value="se connecter">
    </form>
    <?php if (isset($_SESSION['pseudo'])) { ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#creationUser').hide();
          $('#connexionUser').hide();
          $('#decoButton').show();
          $('#bienvenu').show();
          $('#espaceAdmin').show();
        });
        console.log('bouton deco effacer');
      </script>
      <img src="<?php echo $_SESSION['src_profil'] ?>" alt="">
      <p id="bienvenu">bienvenu <?php echo $_SESSION["pseudo"]; ?></p>
    <?php
  }?>
  <form id="espaceAdmin" action="php/pageUtilisateur.php" method="post">
    <input type="submit" value="Ma page">
  </form>
  </section>
  <h1><?php echo $donnees['titre']; ?></h1>
</header>
