<?php
include '../../PHP/fonction.php';
$idProduit = $_GET["idProduit"];
supprimerProduit($idProduit);
header("location:../AfficherProduit/PageProduitForm");