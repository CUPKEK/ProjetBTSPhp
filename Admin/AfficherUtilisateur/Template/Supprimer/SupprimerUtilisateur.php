<?php
include '../../../../Fonction/Fonction.php';
$idclient = $_GET['idclient'];
supprimerClientProduit($idclient);
supprimerClientClient($idclient);
supprimerClientImage($idclient);
header("location:../PageUtilisateurForm");
?>
