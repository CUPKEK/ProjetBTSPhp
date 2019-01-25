<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <script src="../JS/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="../JS/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="../CSS/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../Fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
    <script src="../Plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
    <link href="../Plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">
    <link href="../Plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
    <script src="../Plugins/owlcarousel/owl.carousel.min.js"></script>
    <link href="../CSS/ui.css" rel="stylesheet" type="text/css"/>
    <link href="../CSS/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <script src="../JS/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        });
    </script>

    <?php
    include '../Navbar/navbar.php';
    returnUtilisateur($id);
    $nombresProduit = countNombreProduit();
    $typeProduit = affichagetypeProduit();
    $NomProduit = $_POST['Rechercher'];
    $affichageProduitRecherche = rechercherProduit($NomProduit);
    $accueil = affichageDescriptionProduit($affichageProduitRecherche[0]->idProduit);
    $affichageProduit = returnNombreProduitRecherche($affichageProduitRecherche[0]->idProduit);
    $image = affichageImageIdProduit($affichageProduitRecherche[0]->idProduit);

    ?>
<body>
<header class="section-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="../Index/Index.php"><img class="logo" src="../Images/Meuble.png" title="Meuble.com"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
                    aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTop">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a href="../Index/Index.php" class="nav-link">Acheter</a>
                    </li>
                    <li class="nav-item dropdown"><a href="../Produit/Ajout/Ajout%20Produit/Page/Ajout%20Produit.php" class="nav-link">Vendre</a>
                    </li>
                    <?php if (isset($_SESSION['Login']) && $_SESSION['Login']==1): ?>
                        <li class="nav-item dropdown"><a href="../Credit" class="nav-link"><?=$infoCredit[0]->CreditCli;?>Crédit</a>
                        </li>
                        <li class="nav-item dropdown"><a href="../Fonction/Deconnexion.php" class="nav-link">Deconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown"><a href="../Connexion/Page%20Connexion/Connexion.php" class="nav-link">
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
                            <a class="dropdown-item" href="../Index/Index%20Chaise/IndexChaise.php?Categorie=Chaise">Chaise</a>
                            <a class="dropdown-item" href="../Index/Index%20Meuble/IndexMeuble.php?Categorie=Meuble">Meuble</a>
                            <a class="dropdown-item" href="../Index/Index%20Electronique/IndexElectronique.php?Categorie=Electronique">Electronique</a>
                            <a class="dropdown-item" href="../Index/Index%20Jardin/IndexJardin.php?Categorie=Jardin">Jardin</a>
                            <a class="dropdown-item" href="../Index/Index%20Beauté/IndexBeaute.php?Categorie=Beaute">Beauté</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11-24 col-sm-8">
                    <form action="../Index/Recherche.php" class="py-1">
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
<section class="section-content bg padding-y-sm">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3-24"> <strong>Filtrer par</strong> </div>
                    <div class="col-md-21-24">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#">Couleur</a></li>
                            <li class="list-inline-item"><a href="#">Marque</a></li>
                            <li class="list-inline-item"><a href="#">Poid</a></li>
                            <li class="list-inline-item">
                                <div class="form-inline">
                                    <label class="mr-2">Prix</label>
                                    <input class="form-control form-control-sm" placeholder="Min" type="number">
                                    <span class="px-2"> - </span>
                                    <input class="form-control form-control-sm" placeholder="Max" type="number">
                                    <button type="submit" class="btn btn-sm ml-2">Ok</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="padding-y-sm">
            <span>
                <?php

                ?>
            </span>
            </div>


            <div class="row-sm">
                <?php
                for($i=0;$i<count($affichageProduit);$i++)
                {
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <figure class="card card-product">
                            <div class="img-wrap"><img src="../Produit/Ajout/Images%20Produit/uploads/<?=$image[$i]->file_name;?>"></div>
                            <figcaption class="info-wrap">
                                <a href="../Produit/Achat/Produits.php?idProduit='<?=$accueil[$i]->idProduit;?>'" class="title"><?=$accueil[$i]->NomProduit;?></a>
                                <div class="price-wrap">
                                    <span class="price-new"><?=$accueil[$i]->PrixProduit;?> Crédit</span>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <?php
                }
                ?>
            </div>
</section>


<footer class="section-footer bg-secondary">
    <div class="container">
        <section class="footer-top padding-top">
            <div class="row">
                <aside class="col-sm-3 col-md-3 white">
                    <h5 class="title">Customer Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Help center</a></li>
                        <li><a href="#">Money refund</a></li>
                        <li><a href="#">Terms and Policy</a></li>
                        <li><a href="#">Open dispute</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3  col-md-3 white">
                    <h5 class="title">My Account</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"> User Login </a></li>
                        <li><a href="#"> User register </a></li>
                        <li><a href="#"> Account Setting </a></li>
                        <li><a href="#"> My Orders </a></li>
                        <li><a href="#"> My Wishlist </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3  col-md-3 white">
                    <h5 class="title">About</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"> Our history </a></li>
                        <li><a href="#"> How to buy </a></li>
                        <li><a href="#"> Delivery and payment </a></li>
                        <li><a href="#"> Advertice </a></li>
                        <li><a href="#"> Partnership </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3">
                    <article class="white">
                        <h5 class="title">Contacts</h5>
                        <p>
                            <strong>Phone: </strong> +123456789 <br>
                            <strong>Fax:</strong> +123456789
                        </p>

                        <div class="btn-group white">
                            <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i
                                    class="fab fa-facebook-f  fa-fw"></i></a>
                            <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i
                                    class="fab fa-instagram  fa-fw"></i></a>
                            <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i
                                    class="fab fa-youtube  fa-fw"></i></a>
                            <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i
                                    class="fab fa-twitter  fa-fw"></i></a>
                        </div>
                    </article>
                </aside>
            </div> <!-- row.// -->
            <br>
        </section>
    </div>
</footer>
</body>
