<?php
include '../../../../Fonction/Fonction.php';
$Categorie = postVar("Categorie");
$Marque = postVar("Marque");

$id = ajouterTypeProduit($Categorie, $Marque);