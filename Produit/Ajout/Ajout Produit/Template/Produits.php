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



$id = ajouterProduit($idProduit, $PrixProduit, $StockProduit, $PoidProduit, $NomProduit, $DescriptionProduit, $CouleurProduit, $idclient) ;

