<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <script src="../../../../JS/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="../../../../JS/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="../../../../CSS/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../../../../Fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
    <script src="../../../../Plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
    <link href="../../../../Plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">
    <link href="../../../../Plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../../Plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
    <script src="../../../../Plugins/owlcarousel/owl.carousel.min.js"></script>
    <link href="../../../../CSS/ui.css" rel="stylesheet" type="text/css"/>
    <link href="../../../../CSS/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <script src="../../../../JS/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        });
    </script>
</head>

<body>
<?php
include '../../../../Navbar/Navbar.php';
returnUtilisateur($id);
$id = $_SESSION['idclient'];
?>
<header class="section-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="../../../../Index/Index.php"><img class="logo" src="../../../../Images/Meuble.png" title="Meuble.com"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
                    aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTop">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a href="../../../../Index/Index.php" class="nav-link">Acheter</a>
                    </li>
                    <li class="nav-item dropdown"><a href="../../../../Produit/Ajout/Ajout%20Produit/Page/Ajout%20Produit.php" class="nav-link">Vendre</a>
                    </li>
                    <?php if (isset($_SESSION['Login']) && $_SESSION['Login']==1): ?>
                        <li class="nav-item dropdown"><a href="../../../../Credit" class="nav-link"><?=$infoCredit[0]->CreditCli;?>Crédit</a>
                        </li>
                        <li class="nav-item dropdown"><a href="../../../../Fonction/Deconnexion.php" class="nav-link">Deconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown"><a href="../../../../Connexion/Page%20Connexion/Connexion.php" class="nav-link">
                                Connexion</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row-sm align-items-center">
                <div class="col-lg-4-24 col-sm-3">
                    <div class="category-wrap dropdown py-1">
                        <button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-bars"></i> Categories
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Chaise</a>
                            <a class="dropdown-item" href="#">Meubles</a>
                            <a class="dropdown-item" href="#">Electronique</a>
                            <a class="dropdown-item" href="#">Jardin</a>
                            <a class="dropdown-item" href="#">Beauté</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11-24 col-sm-8">
                    <form action="#" class="py-1">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" style="width:50%;" placeholder="Rechercher">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i> Rechercher
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-9-24 col-sm-12">
                    <div class="widgets-wrap float-right row no-gutters py-1">
                        <div class="col-auto">
                            <a href="#" class="widget-header">
                                <div class="icontext">
                                    <div class="icon-wrap"><i class="text-warning icon-sm fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="text-wrap text-dark">
                                        Mon Panier
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>

<div class="container">
    <div class="Product_Content tab-content">
        <div id="Product_main" class="tab-pane active">
            <form class="form-horizontal" action='../Template/typeProduits.php' method="POST">
                <fieldset>

                    <h3>Information supplémentaire sur le produit</h3>

                    <div class=" col-lg-12 form-group">
                        <label class="col-lg-2" for="Categorie">Catégorie</label>
                        <div class="col-lg-4">
                            <select id="Categorie" name="Categorie" class="form-control product-type">
                                <option value="0">-Select-</option>
                                <option value="Chaise">Chaise</option>
                                <option value="Meubles">Meubles</option>
                                <option value="Electronique">Electronique</option>
                                <option value="Jardin">Jardin</option>
                                <option value="Beauté">Beauté</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <label class="col-lg-2" for="Marque">Marque</label>
                        <div class="col-lg-4">
                            <input type="text" id="Marque" name="Marque" placeholder="" class="form-control sku">
                        </div>
                    </div>

                    <input type="number" name="idProduit" value="<?php echo $id ?>" hidden>
                </fieldset>
                <div class="form-group ">
                    <button class="btn btn-primary" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>