<header>
  <section>
    <p>bienvenu <?php echo $_SESSION["pseudo"]; ?></p>
    <form action="php/deconnexion.php" method="post">
    <input type="submit" value="Déconnexion" />
    </form>
  </section>
  <h1><?php echo $titre['titre']; ?></h1>
</header>
