<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../MonProfil.css">
</head>

<?php
include '../../Navbar/Navbar.php';
$idclient = $_GET['idclient'];
$client = afficherClient($idclient);
?>


<body>
<div class="container">
    <div class="row">
        <div class=" col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-md-offse-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <img class="img-circle img-responsive" src="../../Images/profil.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="centered-text col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                        <h2> <span itemprop="name"><?=$client[0]->NomCli;?></span></h2>
                                        <p itemprop="jobTitle"><?=$client[0]->PrenomCli;?></p>
                                        <p><span itemprop="affiliation"><?=$client[0]->UsernameCli;?></span></p>
                                        <p>
                                            <i class="fa fa-map-marker"></i> <span itemprop="addressRegion"><?=$client[0]->NumeroCli;?></span>
                                        </p>
                                        <p itemprop="email"> <i class="fa fa-envelope"> </i> <a href="mailto:<?=$client[0]->MailCli;?>"><?=$client[0]->MailCli;?></a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
