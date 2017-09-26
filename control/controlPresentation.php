<?php
session_start();
include('../model/modelPresentation.php');
$Produit = affichageProduit();

include('../vue/vuePresentation.php');
