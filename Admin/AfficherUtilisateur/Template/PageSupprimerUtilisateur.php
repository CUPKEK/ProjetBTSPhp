<?php
include '../../PHP/fonction.php';
$idclient = $_GET['idclient'];
supprimerClientProduit($idclient);
supprimerClientClient($idclient);
supprimerClientImage($idclient);
header("location:../AfficherUtilisateur/PageUtilisateurForm");
?>
