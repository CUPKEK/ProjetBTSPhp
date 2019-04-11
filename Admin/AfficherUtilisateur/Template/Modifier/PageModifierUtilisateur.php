<?php
$idclient = $_GET['idclient'];
?>

<body>
<form method="post" action="../Modifier/ModifierUtilisateur.php">
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
        <input name="idclient" class="form-control" value="<?=$idclient;?>" type="hidden">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
        <input name="NomCli" class="form-control" placeholder="Nouveau Nom" type="text">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
        <input name="PrenomCli" class="form-control" placeholder="Nouveau Prenom" type="text">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
        </div>
        <input name="MailCli" class="form-control" placeholder="Nouveau Email" type="email">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
        </div>
        <input name="NumeroCli" class="form-control" placeholder="Nouveau Numéro" type="text">
    </div>


    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
        </div>
        <input name="UsernameCli" class="form-control" placeholder="Nouveau Nom Utilisateur" type="text">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input name="MdpCli" class="form-control" placeholder="Nouveau Mot de Passe" type="password">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
        </div>
        <input name="PaysCli" class="form-control" placeholder="Nouveau Pays" type="text">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
        </div>
        <input name="CreditCli" class="form-control" placeholder="Nouveau Crédit" type="text">
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Modifier Compte</button>
    </div>
</form>
</body>