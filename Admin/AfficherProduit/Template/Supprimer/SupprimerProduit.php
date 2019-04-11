<?php
include '../../../../Fonction/Fonction.php';
$idProduit = $_GET["idProduit"];
supprimerProduit($idProduit);
supprimerImages($idProduit);
header("location: ../../../../Admin/AfficherProduit/PageProduitForm.php");