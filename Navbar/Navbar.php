<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php
    session_start();
    include(dirname(__FILE__).'/../Fonction/Fonction.php');
    $id = (isset($_SESSION['idclient']));
    $infoCredit = infoClient($id);
    ?>
</head>