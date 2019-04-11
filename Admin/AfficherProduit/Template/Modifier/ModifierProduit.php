<?php

include '../../../../Fonction/Fonction.php';
$idProduit = postVar("idProduit");
$PrixProduit = postVar("PrixProduit");
$StockProduit = postVar("StockProduit");
$PoidProduit = postVar("PoidProduit");
$NomProduit = postVar("NomProduit");
$DescriptionProduit = postVar("DescriptionProduit");
$CouleurProduit = postVar("CouleurProduit");
$idclient = postVar("idclient");
$Categorie = postVar("Categorie");
$Marque = postVar("Marque");

ModifierProduit($idProduit, $PrixProduit, $StockProduit, $PoidProduit, $NomProduit, $DescriptionProduit, $CouleurProduit, $idclient);
ModifierProduitMarque($Categorie, $Marque, $idProduit);
