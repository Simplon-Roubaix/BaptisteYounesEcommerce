<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>inscription</title>
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
    <h1>Inscription</h1>
    <form action="creationUser_Insert.php" method="post">
        <label for="">Entrez un pseudo</label>
        <input type="text" name="pseudo" value=""><br>

        <label for="">entrez un mot de passe</label>
        <input type="password" name="user_password" value=""><br>

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
  </body>
</html>
