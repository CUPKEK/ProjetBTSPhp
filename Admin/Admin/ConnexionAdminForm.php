<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>


<body>
    <div class="col-md-12">
        <div class="modal-dialog" style="margin-bottom:0">
            <div class="modal-content">
                <div class="panel-heading">
                    <h3 class="panel-title">Connexion Admin</h3>
                </div>
                <div class="panel-body">
                    <form role="form" class="form" action="Template/ConnexionAdmin.php" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mail" name="UsernameCli" id="UsernameCli" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="MdpCli" id="MdpCli" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="connexion" class="btn btn-info btn-md" value="Valider">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
