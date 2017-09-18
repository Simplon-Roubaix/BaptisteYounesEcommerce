<header>
  <section>
    <?php if (!isset($_SESSION['pseudo'])) {
      ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#decoButton').hide();
          $('#bienvenu').hide();
          $('#creationUser').show();
          $('#connexionUser').show();
        });
        console.log('bouton deco effacer');
      </script>
      <?php
    } ?>

    <!--formulaire pour se deconnecter, apparais seulement lorsque l'utilisateur est connecter-->
    <form id='decoButton' action="<?php echo $chemin_deco ?>" method="post">
    <input type="submit" value="Déconnexion" />
    </form>

    <!--formulaire permettant de s'inscrire-->
    <form id="creationUser" action="php/creationUser.php" method="post">
      <input type="submit" value="s'inscrire">
    </form>

    <!--formulaire pour se connecter lorsque l'utilisateur s'est inscrit préalablement-->
    <form id="connexionUser" action="php/connexion.php" method="post">
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
        });
        console.log('bouton deco effacer');
      </script>
      <img src="<?php echo $_SESSION['src_profil'] ?>" alt="">
      <p id="bienvenu">bienvenu <?php echo $_SESSION["pseudo"]; ?></p>
    <?php
  }?>
  </section>
  <h1><?php echo $titre['titre']; ?></h1>
</header>
