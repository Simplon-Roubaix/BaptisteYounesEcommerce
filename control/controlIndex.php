<?php
include('model/modelIndex.php');

$selectionProduit = affichageProduit();

if (isset($_POST['connexion_pseudo']) and isset($_POST['connexion_password'])) {
  $pseudo = $_POST['connexion_pseudo'];
  $password = $_POST['connexion_password'];
  connexionUtilisateur($pseudo, $password);
}

if (!isset($_POST['deco'])) {
  deconnexionUtilisateur();
}
//traitement des envois du formulaire pour s'inscrire
if (isset($_POST['pseudo']) and isset($_POST['user_password']) and isset($_POST['src_profil']) and isset($_POST['mail_user']) and isset($_POST['prenom']) and isset($_POST['nom'])) {
  if ($_POST['user_password'] == $_POST['validation_password']) {
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail_user'])){
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $user_password = $_POST['user_password'];
      $src_profil = htmlspecialchars($_POST['src_profil']);
      $email = htmlspecialchars($_POST['mail_user']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $nom = htmlspecialchars($_POST['nom']);
      ajoutUtilisateur($pseudo, $user_password, $src_profil, $email, $prenom, $nom);
    }
    else {
      echo "le mail n'est pas valide";
    }
  }
  else {
    var_dump($_POST['user_password']);
    var_dump($_POST['validation_password']);
    echo " vous n'avez pas tapez le meme mot de passe dans la vérification";
  }
}



if (!isset($_SESSION['pseudo'])) {
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#inscription').show();
  });
</script>
<?php }?>
<?php
if (isset($_SESSION['pseudo'])) {
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#inscription').hide();
  });
</script>
<?php }

include('vue/vueIndex.php'); ?>
