<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    <link href="../Template/css.css" rel="stylesheet" type="text/css"/>
    <script src="../../JS/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        });
    </script>
</head>
<?php
include '../../Navbar/Navbar.php';


$idProduit  = trim($_SESSION["idProduit"],"'");
$idvendeur = $_SESSION['idvendeur'];
$idacheteur = $_SESSION['idclient'];
$erreur = false;

if(isset($idProduit)){
    $accueil = affichageDescriptionProduit($idProduit);
    $stock = returnStock($idProduit);
}

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
    if(!in_array($action,array('ajout', 'suppression', 'refresh')))
        $erreur=true;

    //récuperation des variables en POST ou GET
    $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
    $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
    $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
    $id = (isset($_POST['id'])? $_POST['id']:  (isset($_GET['id'])? $_GET['id']:null )) ;

    //Suppression des espaces verticaux
    $l = preg_replace('#\v#', '',$l);
    //On verifie que $p soit un float
    $p = floatval($p);
    $_SESSION['quantite'] = $q;
    $quantite = $_SESSION['quantite'];

    //On traite $q qui peut etre un entier simple ou un tableau d'entier

    if (is_array($q)){
        $QteArticle = array();
        $i=0;
        foreach ($q as $contenu){
            $QteArticle[$i++] = intval($contenu);
        }
    }
    else
        $q = intval($q);

}


if (!$erreur){
    switch($action){
        Case "ajout":
            ajouterArticle($l,$q,$p,$id);
            break;

        Case "suppression":
            supprimerArticle($l);
            break;

        Case "refresh" :
            for ($i = 0 ; $i < count($QteArticle) ; $i++)
            {
                modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
            }
            break;

        Default:
            break;
    }
}
?>

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

    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="PanierForm.php">
                        <table style="width: 400px">
                            <tr>
                                <td>Nom Produit</td>
                                <td>Quantité</td>
                                <td>Prix Unitaire</td>
                                <td>Action</td>
                            </tr>


                            <?php
                            if (creationPanier())
                            {
                                $nbArticles=count($_SESSION['panier']['libelleProduit']);
                                if ($nbArticles <= 0)
                                    echo "<tr><td>Votre panier est vide </td></tr>";
                                else
                                {
                                    for ($i=0 ;$i < $nbArticles ; $i++)
                                    {
                                        echo "<tr>";
                                        echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</td>";
                                        echo "<td><input class=\"form-control form-control-sm\" placeholder=\"Max\" max=\"4\" type=\"number\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                                        echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])." Crédit </td>";
                                        echo "<td><button class=\"btn btn-outline-danger btn-xs\"><a href=\"".htmlspecialchars("PanierForm.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Supprimer</a></button></td>";
                                        echo "</tr>";
                                        $prixProduit = $_SESSION['panier']['prixProduit'];
                                    }

                                    echo "<tr><td colspan=\"2\"> </td>";
                                    echo "<td colspan=\"2\">";
                                    echo "Total : ".MontantGlobal(); echo "  Crédit";
                                    echo "</td></tr>";

                                    echo "<tr><td colspan=\"4\">";
                                    echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                                    echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                                    echo "</td></tr>";
                                    echo"
                                    
                                    <a href='../../Transaction/Transaction.php?quantite=$quantite[0]&amp;idvendeur=$idvendeur&amp;idacheteur=$idacheteur&amp;idProduit=$idProduit&amp;prixProduit=$prixProduit[0]'>
                                        <button type='button' class='btn btn-primary btn-sm btn-block'>
                                            <span class='glyphicon glyphicon-share-alt'></span>Accepter le payement
                                        </button>
                                    </a>";
                                }
                            }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
</body>