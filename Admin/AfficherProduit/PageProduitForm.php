<head>
    <link rel="stylesheet" type="text/css" href="Template/PageProduit.css" media="all" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
</div>x
<?php
include '../../Fonction/fonction.php';
$produit = affichageProduit();
$image = affichageImage();
$NombreProduit = returnNombreProduit();
for($i=0;$i<count($NombreProduit);$i++) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <h4 class="text-center"><span class="label label-info">PRODUIT</span></h4>
                        <img src="../../PageAjoutProduit/uploads/<?=$image[$i]->file_name;?>" class="img-responsive">
                        <div class="caption">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <h3><?=$produit[$i]->NomProduit;?></h3>
                                </div>
                                <div class="col-md-6 col-xs-6 price">
                                    <h3>
                                        <label><?=$produit[$i]->PrixVenteProduit;?>  Crédit</label></h3>
                                </div>
                            </div>
                            <p><?=$produit[$i]->DescriptionProduit;?></p>
                            <p></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-info">
                                        Modifier
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-danger" href="Template/SupprimerProduit.php?idProduit='<?=$produit[$i]->idProduit;?>'">
                                        Supprimer
                                    </a>
                                </div>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
</body>
