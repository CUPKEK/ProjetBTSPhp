<?php
include '../Fonction/Fonction.php';
$idProduit = $_GET["idProduit"];
$idAcheteur = $_GET['idacheteur'];
$idVendeur = $_GET['idvendeur'];
$StockProduit = intval($_GET["quantite"]);
$prixProduit = intval($_GET['prixProduit']);

payementAcheteurVendeur($idAcheteur, $idVendeur, $StockProduit, $prixProduit);
payementProduit($idProduit, $StockProduit);
header('location: ../Index/Index.php');