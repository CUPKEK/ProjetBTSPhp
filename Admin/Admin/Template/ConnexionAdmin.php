<?php

include '../../../Fonction/fonction.php';
$MailCli = $_POST['MailCli'];
$MdpCli = $_POST['MdpCli'];

$bdd = getDatabase();
$req = $bdd->prepare('SELECT idclient, MailCli, MdpCli FROM client WHERE MailCli = :MailCli and Admin = 1');
$req->execute(array('MailCli' => $MailCli));

$resultat = $req->fetch();

$isPasswordCorrect = ($_POST['MdpCli'] == $resultat['MdpCli']);

if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
}
else {
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['idclient'] = $resultat['idclient'];
        $_SESSION['MailCli'] = $MailCli;
        $_SESSION['MdpCli'] = $MdpCli;
        $_SESSION["Login"] = 1;
        header('Location: ../../Admin/PageAdminForm.php');

    } else {
        echo 'Mauvaise adresse mail ou mot de passe !';
    }
}
?>





