<header>
  <section>
    <?php if ($connexion = false) {
      ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#decoButton').hide();
          $('#bienvenu').hide();
          $('#creationUser').show();
        });
        console.log('bouton deco effacer');
      </script>
      <?php
    } ?>

    <form id='decoButton' action="<?php echo $chemin_deco ?>" method="post">
    <input type="submit" value="Déconnexion" />
    </form>

    <form id="creationUser" action="php/creationUser.php" method="post">
      <input type="submit" value="s'inscrire">
    </form>
    <?php if ($connexion = true and isset($_SESSION['pseudo'])) { ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#creationUser').hide();
          $('#decoButton').show();
          $('#bienvenu').show();
        });
        console.log('bouton deco effacer');
      </script>
      <img src="<?php echo $_SESSION['src_profil'] ?>" alt="">
      <p id="bienvenu">bienvenu <?php echo $_SESSION["pseudo"]; ?></p>
    <?php
      } ?>
  </section>
  <h1><?php echo $titre['titre']; ?></h1>
</header>
