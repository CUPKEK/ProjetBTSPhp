<?php

include '../PHP/fonction.php';
$UsernameCli = $_POST['UsernameCli'];
$MdpCli = $_POST['MdpCli'];

$bdd = getDatabase();
$req = $bdd->prepare('SELECT idclient, UsernameCli, MdpCli FROM client WHERE UsernameCli = :UsernameCli and admin = 1');
$req->execute(array('UsernameCli' => $UsernameCli));

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
        header('Location: ../Admin/PageAdminForm.php');

    } else {
        echo 'Vous devez être un Admin pour vous logger !';
    }
}
?>






