<?php
session_start();
include('../model/modelPresentation.php');
$Produit = affichageProduit();

// if (isset()) {
//   # code...
// }

include('../vue/vuePresentation.php');
