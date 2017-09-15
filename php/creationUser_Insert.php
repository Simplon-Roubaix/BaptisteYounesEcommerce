<?php
    session_start();
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=siteCommercialSimplon;charset=utf8', 'root', 'root');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }
      $pseudo =  htmlspecialchars($_POST['pseudo']);
      $user_password = htmlspecialchars($_POST['user_password']);
      $src_profil = htmlspecialchars($_POST['src_profil']);
      $email = htmlspecialchars($_POST['mail_user']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $nom = htmlspecialchars($_POST['nom']);
      $req = $bdd->prepare('INSERT INTO utilisateur(pseudo, user_password, user_img, email, prenom, nom) VALUES (:pseudo, :user_password, :user_img, :email, :prenom, :nom)');
      $req->execute(array(
        'pseudo'=>$pseudo,
        'user_password'=>$user_password,
        'user_img'=>$src_profil,
        'email'=> $email,
        'prenom' => $prenom,
        'nom' => $nom
      ));
      $_SESSION['pseudo'] = $pseudo;
      header('Location: ../index.php?connexion=true');
      ?>
