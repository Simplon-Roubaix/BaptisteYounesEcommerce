<?php session_start();
ob_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  $selectionProduit = $bdd->query('SELECT article.id as id, src_img, alt,
    titre, resume, auteur, date_post
    FROM article inner join image
    on article.id = image.id');
  if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){
    if ($_FILES['monfichier']['size'] <= 1000000){
      $infosfichier = pathinfo($_FILES['monfichier']['name']);
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
      if (in_array($extension_upload, $extensions_autorisees)){
        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
        echo "L'envoi a bien été effectué !";
      }
    }
  }
  $titre = $_POST['titre'];
  $resume = $_POST['resume'];
  $texte = $_POST['texte'];
  $auteur = $_POST['auteur'];
  $ajoutProduit = $bdd->prepare('INSERT into article(titre, resume, texte, auteur, now()) values (:titre, :resume, :texte, :auteur)');
  $ajoutProduit->execute(array(
    'titre'=>$pseudo,
    'resume'=>$resume,
    'texte'=>$texte,
    'auteur'=>$auteur
  ));  ?>
