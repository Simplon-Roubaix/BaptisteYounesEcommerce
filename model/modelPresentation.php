<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  }
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }

  function affichageProduit(){
    global $bdd;
    $Produit = $bdd->prepare('SELECT article.id as id, src_img, alt, titre, texte, auteur, date_post
    FROM article inner join image
    on article.id = image.id
    where id = "'.$_POST["selection"].'"');
    var_dump($Produit);
    return $Produit;
  }
  ?>
