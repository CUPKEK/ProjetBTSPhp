<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <script src="../../JS/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="../../JS/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="../../CSS/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../../Fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
    <script src="../../Plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
    <link href="../../Plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">
    <link href="../../Plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../Plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
    <script src="../../Plugins/owlcarousel/owl.carousel.min.js"></script>
    <link href="../../CSS/ui.css" rel="stylesheet" type="text/css"/>
    <link href="../../CSS/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <script src="../../JS/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        });
    </script>
    <?php
    include '../../Navbar/Navbar.php';
    $idClient = $_SESSION['idclient'];
    $_SESSION['idProduit'] = $idProduit = $_GET['idProduit'];
    returnUtilisateur($id);
    $vousaimerezaussi = affichageProduit($idClient);
    $idProduitPromo = $vousaimerezaussi[0]->idProduit;
    $accueil = affichageDescriptionProduit($idProduit);
    $donneeCli = affichageClient($id);
    $image = afficherImageParID($idProduit);
    $AffCli = affichageClienProduit($idProduit);
    $_SESSION['idvendeur'] = $AffCli[0]->idclient;
    $imagePromo = affichageImagePromo($idClient, $idProduitPromo);

    ?>

</head>
<body>
<header class="section-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="../../Index/Index.php"><img class="logo" src="../../Images/Meuble.png" title="Meuble.com"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
                    aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTop">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a href="../../Index/Index.php" class="nav-link">Acheter</a>
                    </li>
                    <li class="nav-item dropdown"><a href="../../Produit/Ajout/Ajout%20Produit/Page/Ajout%20Produit.php" class="nav-link">Vendre</a>
                    </li>
                    <?php if (isset($_SESSION['Login']) && $_SESSION['Login']==1): ?>
                        <li class="nav-item dropdown"><a href="../../Credit" class="nav-link"><?=$infoCredit[0]->CreditCli;?>Crédit</a>
                        </li>
                        <li class="nav-item dropdown"><a href="../../Fonction/Deconnexion.php" class="nav-link">Deconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown"><a href="../../Connexion/Page%20Connexion/Connexion.php" class="nav-link">
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
                            <a class="dropdown-item" href="../../Index/IndexCategorie.php?Categorie=Chaise">Chaise</a>
                            <a class="dropdown-item" href="../../Index/IndexCategorie.php?Categorie=Meuble">Meuble</a>
                            <a class="dropdown-item" href="../../Index/IndexCategorie.php?Categorie=Electronique">Electronique</a>
                            <a class="dropdown-item" href="../../Index/IndexCategorie.php?Categorie=Jardin">Jardin</a>
                            <a class="dropdown-item" href="../../Index/IndexCategorie.php?Categorie=Beaute">Beauté</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11-24 col-sm-8">
                    <form action="../../Index/IndexRecherche.php" method="POST" class="py-1">
                        <div class="input-group w-100">
                            <input type="text" id="Rechercher" name="Rechercher" class="form-control" style="width:50%;" placeholder="Rechercher">
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
                            <a href="../../Panier/Page%20Panier/PanierForm.php" class="widget-header">
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
<section class="section-content bg padding-y-sm">
    <div class="container">
            <div class="row">
            <div class="col-xl-10 col-md-9 col-sm-12">
                <main class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-6 border-right">
                            <article class="gallery-wrap">
                                <div class="img-big-wrap">
                                    <div> <a href="../Produit/Ajout/Images%20Produit/uploads/<?=$image[0]->file_name;?>" data-fancybox="../../Produit/Ajout/Images%20Produit/uploads/<?=$image[0]->file_name;?>"><img src="../../Produit/Ajout/Images%20Produit/uploads/<?=$image[0]->file_name;?>"></a></div>
                                </div>
                            </article>
                        </aside>
                        <aside class="col-sm-6">
                            <article class="card-body">
                                <h3 class="title mb-3"><?=$accueil[0]->NomProduit;?></h3>
                                <div class="mb-3">
                                    <var class="price h3 text-warning">
                                        <span class="currency">Crédit    </span><span class="num"><?=$accueil[0]->PrixProduit;?></span>
                                    </var>
                                </div>
                                <dl>
                                    <dt>Description</dt>
                                    <dd><p><?=$accueil[0]->DescriptionProduit;?></p></dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Model#</dt>
                                    <dd class="col-sm-9"><?=$accueil[0]->idProduit;?></dd>

                                    <dt class="col-sm-3">Couleur</dt>
                                    <dd class="col-sm-9"><?=$accueil[0]->CouleurProduit;?></dd>
                                </dl>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <dl class="dlist-inline">
                                            <dt>Quantité en Stock: </dt>
                                            <dd>
                                                <div class="section" style="padding-bottom:20px;">
                                                    <div>
                                                        <?=$accueil[0]->StockProduit;?>
                                                    </div>
                                                </div>
                                            </dd>
                                        </dl>  <!-- item-property .// -->
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                                <hr>
                                <a href="mailto:<?=$AffCli[0]->MailCli;?>" class="btn  btn-warning"> <i class="fa fa-envelope"></i>Contacter le vendeur</a>
                                <?php
                                if ($accueil[0]->PrixProduit>$donneeCli[0]->CreditCli){
                                    ?>
                                        <a href="../../Credit/Page%20Crédit/Page%20Crédit.php" class="btn  btn-outline-warning">Acheter crédit</a>';
                                    <?php
                                }
                                else{
                                    ?>
                                        <a class="btn  btn-outline-warning" href="../../Panier/Page%20Panier/PanierForm.php?action=ajout&amp;l=<?=$accueil[0]->NomProduit;?>&amp;q=1&amp;p=<?=$accueil[0]->PrixProduit;?>&amp;id=<?=$_SESSION['idProduit'];?>&amp;idclient='<?=$_SESSION['idvendeur'];?>'" onclick="window.open(this.href, '','toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=1000, height=600'); return false;">Ajouter au panier</a>
                                    <?php
                                }
                                ?>

                            </article>
                        </aside>
                    </div>
                </main>
            </div> <!-- col // -->
            <aside class="col-xl-2 col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Profil du vendeur
                    </div>
                    <div class="card-body small">
                        <span><?=$AffCli[0]->UsernameCli;?></span>
                        <hr>
                        <?=$AffCli[0]->PaysCli;?>
                        <hr>
                        <a href="../../Profil/Page%20Profil/ProfilForm.php?idclient='<?=$AffCli[0]->idclient;?>'">Visiter profile</a>

                    </div> <!-- card-body.// -->
                </div> <!-- card.// -->
                <div class="card mt-3">
                    <div class="card-header">
                        Vous aimerez aussi
                    </div>
                    <?php
                    for($i=0;$i<1;$i++) {
                        ?>
                        <div class="card-body row">
                            <div class="col-md-12 col-sm-3">
                                <figure class="item border-bottom mb-3">
                                    <a href="#" class="img-wrap"> <img src="../../Produit/Ajout/Images%20Produit/uploads/<?=$imagePromo[$i]->file_name;?>" class="img-md"></a>
                                    <figcaption class="info-wrap">
                                        <a href="#" class="title"><?=$vousaimerezaussi[$i]->NomProduit;?></a>
                                        <div class="price-wrap mb-3">
                                            <span class="price-new"><?=$vousaimerezaussi[$i]->PrixProduit;?></span>
                                        </div> <!-- price-wrap.// -->
                                    </figcaption>
                                </figure> <!-- card-product // -->
                            </div> <!-- col.// -->
                        </div> <!-- card-body.// -->
                        <?php
                    }
                    ?>
                </div> <!-- card.// -->
            </aside> <!-- col // -->
        </div> <!-- row.// -->



    </div><!-- container // -->
</section>
<!-- ========================= SECTION CONTENT .END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary">
    <div class="container">
        <section class="footer-top padding-top">
            <div class="row">
                <aside class="col-sm-3 col-md-3 white">
                    <h5 class="title">Customer Services</h5>
                    <ul class="list-unstyled">
                        <li> <a href="#">Help center</a></li>
                        <li> <a href="#">Money refund</a></li>
                        <li> <a href="#">Terms and Policy</a></li>
                        <li> <a href="#">Open dispute</a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3  col-md-3 white">
                    <h5 class="title">My Account</h5>
                    <ul class="list-unstyled">
                        <li> <a href="#"> User Login </a></li>
                        <li> <a href="#"> User register </a></li>
                        <li> <a href="#"> Account Setting </a></li>
                        <li> <a href="#"> My Orders </a></li>
                        <li> <a href="#"> My Wishlist </a></li>
                    </ul>
                </aside>
                <aside class="col-sm-3  col-md-3 white">
                    <h5 class="title">About</h5>
                    <ul class="list-unstyled">
                        <li> <a href="#"> Our history </a></li>
                        <li> <a href="#"> How to buy </a></li>
                        <li> <a href="#"> Delivery and payment </a></li>
                        <li> <a href="#"> Advertice </a></li>
                        <li> <a href="#"> Partnership </a></li>
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
                            <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
                            <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
                            <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube  fa-fw"></i></a>
                            <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter  fa-fw"></i></a>
                        </div>
                    </article>
                </aside>
            </div> <!-- row.// -->
            <br>
        </section>
        <section class="footer-bottom row border-top-white">
            <div class="col-sm-6">
                <p class="text-white-50"> Made with <3 <br>  by Vosidiy M.</p>
            </div>
            <div class="col-sm-6">
                <p class="text-md-right text-white-50">
                    Copyright &copy  <br>
                    <a href="http://bootstrap-ecommerce.com" class="text-white-50">Bootstrap-ecommerce UI kit</a>
                </p>
            </div>
        </section> <!-- //footer-top -->
    </div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->


</body>
</html>