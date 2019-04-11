<?php
include '../../../../Fonction/Fonction.php';
$idclient = postVar('idclient');
$NomCli = postVar("NomCli");
$PrenomCli = postVar("PrenomCli");
$MailCli = postVar("MailCli");
$UsernameCli = postVar("UsernameCli");
$NumeroCli = postVar("NumeroCli");
$MdpCli = postVar("MdpCli");
$CreditCli = postVar("CreditCli");
$PaysCli = postVar("PaysCli");
$admin = 0;


var_dump(ModifierProfil($idclient, $NomCli, $PrenomCli, $MailCli, $UsernameCli, $NumeroCli, $MdpCli, $CreditCli, $admin, $PaysCli));
error_log("Utilisateur ajouté avec l'identifiant ".$idclient);