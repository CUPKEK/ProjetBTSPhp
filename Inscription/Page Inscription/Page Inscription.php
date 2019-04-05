

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" type="text/css" href="../Template/css.css" media="all" />
</head>






<div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Créer Compte </h4>
        <p>
            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
        </p>
        <p class="divider-text">
            <span class="bg-light">OU</span>
        </p>

        <form method="post" action="../Template/Inscription.php">

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="NomCli" class="form-control" placeholder="Votre Nom" type="text">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="PrenomCli" class="form-control" placeholder="Votre Prenom" type="text">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="MailCli" class="form-control" placeholder="Adresse Email" type="email">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <input name="NumeroCli" class="form-control" placeholder="Votre Numéro" type="text">
            </div>


            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                </div>
                <input name="UsernameCli" class="form-control" placeholder="Votre Nom Utilisateur" type="text">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="MdpCli" class="form-control" placeholder="Mot de Passe" type="password">
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                </div>
                <input name="PaysCli" class="form-control" placeholder="Pays" type="text">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Créer Compte</button>
            </div>

            <p class="text-center">Vous avez un compte?<a href="">S'enregistrer</a> </p>
        </form>
    </article>
</div> <!-- card.// -->

</div>
<!--container end.//-->
