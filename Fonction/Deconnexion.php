<?php
session_start();
session_destroy();
header("location:../Connexion/Page Connexion/Connexion.php");
exit;