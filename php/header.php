<header>
  <section>
    <p id="bienvenu">bienvenu <?php echo $_SESSION["pseudo"]; ?></p>
    <?php if ($_SESSION['connexion'] = false) {
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
    <?php if ($_SESSION['connexion'] = true) {?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#creationUser').hide();
          $('#decoButton').show();
          $('#bienvenu').show();
        });
        console.log('bouton deco effacer');
      </script>
    <?php } ?>
  </section>
  <h1><?php echo $titre['titre']; ?></h1>
</header>
