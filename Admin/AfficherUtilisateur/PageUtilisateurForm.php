<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="Template/PageUtilisateur.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="Template/PageUtilisateur.css">
</head>


<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../Index/Index.php">
                Chaise.com
            </a>
        </div>
    </div>
</nav>
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="../Admin/PageAdminForm.php">Home</a></li>
            <li><a href="../AfficherUtilisateur/PageUtilisateurForm.php">Profil Utilisateur</a></li>
            <li><a href="../AfficherProduit/PageProduitForm.php">Produits en vente</a></li>
            <li><a href="../AfficherImage/PageImageForm.php">Photos mise en ligne</a></li>
            <li><a href="../Admin/PageAdminForm.php">Administration</a></li>
        </ul>
    </div>
</div>
<?php
include '../../Fonction/fonction.php';
$profil = afficherUtilisateurAdmin();
$NombreUtilisateur = returnNombreUtilisateur();
for($i=0;$i<count($NombreUtilisateur);$i++) {
    ?>
    <br><br>
    <div class="container-fluid well span">
        <div class="row-fluid">
            <div class="span2">
                <img class="img-circle img-responsive" src="../../Profil/profil.jpg">
            </div>

            <div class="span10">
                <h3><?=$profil[$i]->UsernameCli;?></h3>
                <h6><?=$profil[$i]->NomCli;?></h6>
                <h6><?=$profil[$i]->PrenomCli;?></h6>
                <h6><?=$profil[$i]->MailCli;?></h6>
                <h6>Crédit: <?=$profil[$i]->CreditCli;?></h6>
                <h6>Numéro: <?=$profil[$i]->NumeroCli;?></h6>
            </div>

            <div class="span">
                <div class="btn-group ">
                    <a class="btn btn-info">Modifier</a>
                    <a class="btn btn-danger" href="Template/PageSupprimerUtilisateur.php?idclient='<?=$profil[$i]->idclient;?>'">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
</body>