<?php

include '../../../../Fonction/Fonction.php';
$idProduit = $_GET['idProduit'];
$idclient = afficherClientProduitAdmin($idProduit);
?>
<body>
<form class="form-horizontal" action='../Modifier/ModifierProduit.php' method="POST">
    <fieldset>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="idclient" class="form-control" value="<?=$idclient[0]->idclient;?>" type="hidden">
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="idProduit" class="form-control" value="<?=$idProduit;?>" type="hidden">
        </div>

        <div class="col-lg-12 form-group margin50">
            <label class="col-lg-2" for="Nom">Nom</label>
            <div class="col-lg-4">
                <input type="text" id="NomProduit" name="NomProduit" placeholder="" class="form-control name">
            </div>
        </div>

        <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="Description">Description</label>
            <div class="col-lg-4">
                <input type="text" id="Description" name="DescriptionProduit" placeholder="" class="form-control sku">
            </div>
        </div>

        <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="StockProduit">Nombre de pièce</label>
            <div class="col-lg-4">
                <input type="text" id="StockProduit" name="StockProduit" placeholder=""
                       class="form-control manufacturer-part">
            </div>
        </div>
        <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="PoidProduit">Poid</label>
            <div class="col-lg-4">
                <input type="text" id="PoidProduit" name="PoidProduit" placeholder="" class="form-control column-width">
            </div>
        </div>
        <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="CouleurProduit">Couleur</label>
            <div class="col-lg-4">
                <input type="text" id="CouleurProduit" name="CouleurProduit" placeholder="" class="form-control weight">
            </div>
        </div>

        <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="PrixProduit">Prix de vente</label>
            <div class="col-lg-4">
                <input type="text" id="PrixProduit" name="PrixProduit" placeholder="" class="form-control price">
            </div>
        </div>

        <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="PrixProduit">Catégorie</label>
            <div class="col-lg-4">
                <input type="text" id="Categorie" name="Categorie" placeholder="" class="form-control price">
            </div>
        </div>

        <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="PrixProduit">Marque</label>
            <div class="col-lg-4">
                <input type="text" id="Marque" name="Marque" placeholder="" class="form-control price">
            </div>
        </div>
    </fieldset>
    <div class="form-group ">
        <button class="btn btn-primary" type="submit">Valider</button>
    </div>
</form>
</body>

