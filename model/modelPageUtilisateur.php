<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  function saisieSession(){
    global $bdd;
    $info_utilisateur = $bdd->query('SELECT pseudo,user_password, user_img, email, prenom, nom FROM utilisateur where pseudo = "'.$_SESSION['pseudo'].'" ');
    $donnees = $info_utilisateur->fetch();
      $_SESSION['password'] = $donnees['user_password'];
      $_SESSION['email'] = $donnees['email'] ;
      $_SESSION['prenom'] = $donnees['prenom'];
      $_SESSION['nom'] = $donnees['nom'];
  }

  function update($pseudo,$password,$email,$prenom, $nom){
    global $bdd;
    $info_utilisateur = $bdd->query('UPDATE utilisateur set pseudo = "'.$_POST['pseudo'].'",
    user_password = "'.$_POST['password'].'",
    email = "'.$_POST['email'].'",
    prenom = "'.$_POST['prenom'].'",
    nom = "'.$_POST['nom'].'" WHERE pseudo = "'.$_SESSION['pseudo'].'" ');
    $_SESSION['pseudo'] = $_POST['pseudo'];
  }

  function ajoutImg($image){
    echo ('lancement ajout image');
    global $bdd;
    $ajoutProduit = $bdd->query('SELECT article.id as id, src_img, alt,
      titre, resume, auteur, date_post
      FROM article inner join image
      on article.id = image.id');
    if (isset($image) AND $image['error'] == 0){
      echo ('verification erreur');
      if ($image['size'] <= 1000000){
        $infosfichier = pathinfo($image['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees)){
          move_uploaded_file($image['tmp_name'], 'img/img_article/'. basename($image['name']));
          $envoisImage = $bdd->prepare('INSERT INTO image(src_img, alt) values (:src_img, :alt)');
          $envoisImage ->execute(array(
            'src_img' => $image['name'],
            'alt' => $image['name']
          ));
          echo "L'envoi a bien été effectué !";
        }
      }
    }
  }

  function ajoutProduit($titre, $resume, $texte, $auteur){
    global $bdd;
    $ajoutProduit = $bdd->prepare('INSERT into article(titre, resume, texte, auteur, now()) values (:titre, :resume, :texte, :auteur)');
    $ajoutProduit->execute(array(
      'titre'=>$pseudo,
      'resume'=>$resume,
      'texte'=>$texte,
      'auteur'=>$auteur
    ));
  }
 ?>
