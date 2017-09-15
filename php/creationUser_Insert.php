<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=exoSql;charset=utf8', 'root', 'root');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }
      $pseudo =  htmlspecialchars($_POST['pseudo']);
      $user_password = htmlspecialchars($_POST['user_password']);
      $src_profil = htmlspecialchars($_POST['src_profil']);
      $mail_user = htmlspecialchars($_POST['mail_user']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $nom = htmlspecialchars($_POST['nom']);
      $req = $bdd->prepare('INSERT INTO utilisateur(pseudo, user_password, src_profil, mail_user, prenom, nom) VALUES (:pseudo, :user_password, :src_profil, :mail_user, :prenom, :nom)');
      $req->execute(array(
        'pseudo'=>$pseudo,
        'user_password'=>$user_password,
        'src_profil'=>$src_profil,
        'mail_user'=> $mail_user,
        'prenom' => $prenom,
        'nom' => $nom
      ));
      header('Location: miniChat.php?connection=true');
      ?>
