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



function addProfil($idclient, $NomClient, $PrenomClient, $MailClient, $UsernameClient, $NumeroCli, $MdpClient, $CreditCli, $admin)
{
    $db = getDatabase();
    $sql='INSERT INTO client (NomCli, PrenomCli, MailCli, UsernameCli, NumeroCli, MdpCli, CreditCli, admin) 
          VALUES(:NomCli, :PrenomCli, :MailCli, :UsernameCli, :NumeroCli, :MdpCli, :CreditCli, :admin)';
    $insert=$db->prepare($sql);
    $values = array('NomCli' => $NomClient, 'PrenomCli' => $PrenomClient, 'MailCli' => $MailClient,
        'UsernameCli' => $UsernameClient, 'NumeroCli' => $NumeroCli, 'MdpCli' => $MdpClient, 'CreditCli' => $CreditCli, 'admin' => $admin);
    $insert->execute($values);
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


function affichageProduit(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit ORDER BY idProduit ASC ");
        if ($stmt->execute()) {
            $chaise = $stmt->fetchAll(PDO::FETCH_OBJ);
            $stmt->closeCursor();
        }
    }
    return $chaise;
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

function affichageProduitType($categorieProduit){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }
    if ($bdd) {
        $stmt = $bdd->prepare("SELECT * FROM produit, typeproduit where typeproduit.Categorie = '$categorieProduit' AND produit.idProduit = typeproduit.idtypeProduit");
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

function affichageImage(){
    $bdd = null;

    if ($bdd == null) {
        $bdd = getDataBase();
    }

    if ($bdd) {
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE produit.idProduit = images.id");
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
        $resultat = $bdd->prepare("SELECT file_name FROM images, produit WHERE idProduit = id and idProduit = $idProduit");
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