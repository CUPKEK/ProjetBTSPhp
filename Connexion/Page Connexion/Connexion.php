<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Template/ConnexionCSS.css" media="all" />
</head>

<body>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="../Template/ConnexionPHP.php" method="post">
                        <h3 class="text-center text-info">Se Connecter</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Adresse Email:</label><br>
                            <input type="text" class="form-control" name="MailCli" id="MailCli">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Mot de Passe:</label><br>
                            <input type="password" class="form-control" name="MdpCli" id="MdpCli">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="connexion" class="btn btn-info btn-md" value="Valider">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
