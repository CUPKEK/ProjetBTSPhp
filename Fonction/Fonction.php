<?php


function getDataBase()
{
    $host = "localhost";
    $dbName = "projetbdd";
    $login = "root";
    $password = "";

    try
    {
        $bdd = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    catch (Exception $e)
    {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());
    }

    return $bdd;
}



function addProfil($idclient, $NomClient, $PrenomClient, $MailClient, $UsernameClient, $NumeroCli, $MdpClient, $CreditCli, $admin, $PaysCli)
{
    $db = getDatabase();
    $sql='INSERT INTO client (NomCli, PrenomCli, MailCli, UsernameCli, NumeroCli, MdpCli, CreditCli, admin, PaysCli) 
          VALUES(:NomCli, :PrenomCli, :MailCli, :UsernameCli, :NumeroCli, :MdpCli, :CreditCli, :admin, :PaysCli)';
    $insert=$db->prepare($sql);
    $values = array('NomCli' => $NomClient, 'PrenomCli' => $PrenomClient, 'MailCli' => $MailClient,
        'UsernameCli' => $UsernameClient, 'NumeroCli' => $NumeroCli, 'MdpCli' => $MdpClient, 'CreditCli' => $CreditCli, 'admin' => $admin, 'PaysCli' => $PaysCli);
    $insert->execute($values);
    header('location: ../../Index/Index.php');
    return $db->lastInsertId();

}

function postVar($name){
    if(isset($_POST[$name])){
        if(!empty($_POST[$name])){
            return $_POST[$name];
        }
        return true;
    }
    return false;
}

function ajouterProduit($idProduit, $PrixProduit, $StockProduit, $PoidProduit, $NomProduit, $DescriptionProduit, $CouleurProduit, $idclient){
    $db = getDatabase();
    $sql='INSERT INTO produit (PrixProduit, StockProduit, PoidProduit, NomProduit, DescriptionProduit, CouleurProduit, idclient)
          VALUES(:PrixProduit, :StockProduit, :PoidProduit, :NomProduit, :DescriptionProduit, :CouleurProduit, :idclient)';
    $insert=$db->prepare($sql);
    $values = array('PrixProduit' => $PrixProduit, 'StockProduit' => $StockProduit, 'PoidProduit' => $PoidProduit, 'NomProduit' => $NomProduit, 'DescriptionProduit' => $DescriptionProduit, 'CouleurProduit' => $CouleurProduit, 'idclient' =>$idclient);
    $insert->execute($values);
    header('location: ../Page/Ajout typeProduit');
    return $db->lastInsertId();
}

function ajouterTypeProduit($Categorie, $Marque){
    $db = getDatabase();
    $sql='INSERT INTO typeProduit (Categorie, Marque)
          VALUES(:Categorie, :Marque)' ;
    $insert=$db->prepare($sql);
    $values = array('Categorie' =>$Categorie, 'Marque' =>$Marque);
    $insert->execute($values);
    header('location: ../../../Ajout/Ajout%20Photo/Ajout%20Photo');
    return $db->lastInsertId();
}

function afficherUtilisateurAdmin(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM client where admin = 0 ORDER BY idclient ASC ");
        if ($stmt->execute()) {
            $client = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $client;
}


function returnNombreUtilisateur(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM client where admin = 0");
        if ($stmt->execute()) {
            $client = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $client;
}

function returnNombreProduit(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit ");
        if ($stmt->execute()) {
            $produit = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $produit;
}

function returnNombreProduitRecherche($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit WHERE idProduit = $idProduit");
        if ($stmt->execute()) {
            $produit = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $produit;
}

function countNombreProduit(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT COUNT(*) FROM produit ");
        if ($stmt->execute()) {
            $produit = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $produit;
}

function countNombreProduitCategorie($categorieProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit, typeproduit WHERE produit.idProduit = typeproduit.idtypeProduit AND typeproduit.Categorie = '$categorieProduit'");
        if ($stmt->execute()) {
            $produit = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $produit;
}

function countNombreProduitPrix($PrixMin, $PrixMax){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit WHERE PrixProduit BETWEEN '$PrixMin' AND '$PrixMax' ");
        if ($stmt->execute()) {
            $produit = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $produit;
}


function returnUtilisateur($id)
{
    $bdd = null;
    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->query("SELECT * FROM client WHERE idclient = $id");
        if ($resultat) {
            $utilisateur = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $utilisateur;
}

function infoClient($id)
{
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT * FROM client WHERE idclient = :idclient");
        $resultat->bindParam(':idclient', $id);
        if ($resultat->execute()) {
            $client = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $client;
}

function affichagetypeProduit(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM typeproduit");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}

function affichageProduit($idClient){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit WHERE StockProduit > 0 and idClient != $idClient ORDER BY idProduit ASC ");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}

function affichageStockProduit($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT StockProduit FROM produit WHERE idProduit = $idProduit ");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}

function affichageProduitType($categorieProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit, typeproduit WHERE produit.idProduit = typeproduit.idtypeProduit AND typeproduit.categorie = '$categorieProduit'");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}

function affichageProduitCouleur(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit ORDER BY CouleurProduit ASC");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}

function affichageProduitMarque(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit, typeproduit WHERE produit.idProduit = typeproduit.idtypeProduit ORDER BY Marque ASC");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}
function affichageProduitPoid(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit, typeproduit WHERE produit.idProduit = typeproduit.idtypeProduit ORDER BY PoidProduit ASC");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}




function affichageProduitParPrix($PrixMin, $PrixMax){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit WHERE PrixProduit BETWEEN '$PrixMin' AND '$PrixMax'");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
}

function rechercherProduit($NomProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit WHERE NomProduit LIKE '%$NomProduit%'");
        if ($stmt->execute()) {
            $affCli = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $affCli;
}

function affichageDescriptionProduit($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit WHERE idProduit = $idProduit");
        if ($stmt->execute()) {
            $affCli = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $affCli;
}

function returnStock($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT StockProduit FROM produit WHERE idProduit = $idProduit");
        if ($stmt->execute()) {
            $affCli = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $affCli;
}

function affichageCreditCli($id){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT CreditCli FROM client WHERE idclient = :pid");
        $resultat->bindParam(':pid', $id);
        if ($resultat->execute()) {
            $client = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $client;
}

function affichageClient($id){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM client WHERE idclient = :pid");
        $stmt->bindParam(':pid', $id);
        if ($stmt->execute()) {
            $affCli = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $affCli;
}

function affichageClienProduit($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM client c, produit p WHERE p.idclient = c.idclient and idProduit = $idProduit");
        if ($stmt->execute()) {
            $affCli = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $affCli;
}

function affichageImage($idClient){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE produit.idProduit = images.idProduit and produit.StockProduit > 0 and images.idClient != $idClient");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}

function affichageImagePromo($idClient, $idProduitPromo){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE images.idProduit = $idProduitPromo and produit.StockProduit > 0 and images.idClient != $idClient");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}

function affichageImageCouleur(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE produit.idProduit = images.id ORDER BY CouleurProduit ASC");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}

function affichageImageMarque(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, typeproduit WHERE images.id = typeproduit.idtypeProduit ORDER BY Marque ASC");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}

function affichageImagePoid(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE produit.idProduit = images.id ORDER BY PoidProduit ASC");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}


function affichageImageCategorie($categorieProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit, typeproduit  WHERE produit.idProduit = images.id and produit.idProduit = typeproduit.idtypeProduit and typeproduit.Categorie = '$categorieProduit'");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}

function affichageImageIdProduit($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE images.id = $idProduit");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}


function afficherImageParID($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE produit.idProduit = images.id and produit.idProduit = $idProduit");
        if ($resultat->execute()) {
            $images = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $images;
}

function afficherClient($idclient){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT * FROM client WHERE idclient = $idclient");
        if ($resultat->execute()) {
            $client = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $client;
}

function afficherClientProduit($idclient){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT * FROM client WHERE client.idclient = produit.idclient and idclient = $idclient");
        if ($resultat->execute()) {
            $client = $resultat->fetchAll(PDO::FETCH_OBJ);
            $resultat->closeCursor();
        }
    }
    return $client;

}

function supprimerClientClient($idclient){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("DELETE FROM client WHERE idclient = $idclient");
        if ($resultat->execute()) {
            $resultat->closeCursor();
        }
    }
}

function supprimerClientProduit($idclient){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("DELETE FROM produit WHERE idclient = $idclient");
        if ($resultat->execute()) {
            $resultat->closeCursor();
        }
    }
}

function supprimerClientImage($idclient){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("DELETE FROM images WHERE idclient = $idclient");
        if ($resultat->execute()) {
            $resultat->closeCursor();
        }
    }
}

function supprimerProduit($idProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("DELETE FROM produit WHERE idProduit = $idProduit");
        if ($resultat->execute()) {
            $resultat->closeCursor();
        }
    }
}

///
///         Fonction Panier
///

function creationPanier(){
    if (!isset($_SESSION['panier'])){
        $_SESSION['panier']=array();
        $_SESSION['panier']['libelleProduit'] = array();
        $_SESSION['panier']['qteProduit'] = array();
        $_SESSION['panier']['prixProduit'] = array();
        $_SESSION['panier']['idProduit'] = array();
        $_SESSION['panier']['verrou'] = false;
    }
    return true;
}

function ajouterArticle($libelleProduit,$qteProduit,$prixProduit,$idProduit){

    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
        //Si le produit existe déjà on ajoute seulement la quantité
        $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

        if ($positionProduit !== false)
        {
            $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
        }
        else
        {
            //Sinon on ajoute le produit
            array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
            array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
            array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
            array_push( $_SESSION['panier']['idProduit'],$idProduit);
        }
    }
    else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function supprimerArticle($libelleProduit){
    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
        //Nous allons passer par un panier temporaire
        $tmp=array();
        $tmp['libelleProduit'] = array();
        $tmp['qteProduit'] = array();
        $tmp['prixProduit'] = array();
        $tmp['idProduit'] = array();
        $tmp['verrou'] = $_SESSION['panier']['verrou'];

        for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
        {
            if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
            {
                array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
                array_push( $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
            }

        }
        //On remplace le panier en session par notre panier temporaire à jour
        $_SESSION['panier'] =  $tmp;
        //On efface notre panier temporaire
        unset($tmp);
    }
    else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function modifierQTeArticle($libelleProduit,$qteProduit){
    //Si le panier éxiste
    if (creationPanier() && !isVerrouille())
    {
        //Si la quantité est positive on modifie sinon on supprime l'article
        if ($qteProduit > 0)
        {
            //Recharche du produit dans le panier
            $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

            if ($positionProduit !== false)
            {
                $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
            }
        }
        else
            supprimerArticle($libelleProduit);
    }
    else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function MontantGlobal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
    {
        $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
    }
    return $total;
}

function isVerrouille(){
    if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
        return true;
    else
        return false;
}

function compterArticles()
{
    if (isset($_SESSION['panier']))
        return count($_SESSION['panier']['libelleProduit']);
    else
        return 0;

}

function supprimePanier(){
    unset($_SESSION['panier']);
}

function payementProduit($idProduit, $StockProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("UPDATE produit SET StockProduit = StockProduit - '$StockProduit' WHERE idProduit = $idProduit");
        if ($stmt->execute()) {
            $stmt->closeCursor();
        }
    }
}

function payementAcheteurVendeur($idAcheteur, $idVendeur, $StockProduit, $prixProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $bdd->beginTransaction();

        $sql = "UPDATE client SET CreditCli = CreditCli + ($prixProduit * $StockProduit) WHERE idClient = $idVendeur";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

        //Query 2: Attempt to update the user's profile.
        $sql = "UPDATE client SET CreditCli = CreditCli - ($prixProduit * $StockProduit) WHERE idClient = $idAcheteur";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

        //We've got this far without an exception, so commit the changes.
        $bdd->commit();
    }
}

