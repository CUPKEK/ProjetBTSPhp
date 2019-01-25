<?php
// Include the database configuration file
include '../../../Navbar/Navbar.php';
$statusMsg = '';

// File upload path
$targetDir = "../Images Produit/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$id = $_SESSION['idclient'];

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $db = getDatabase();
            $insert = $db->query("INSERT into images (file_name, uploaded_on, idclient) VALUES ('".$fileName."', NOW(), ".$id.")");
            if($insert){
                $statusMsg = "L'image ".$fileName. " a bien été envoyé.";
            }else{
                $statusMsg = "L'envoie a échoué";
            }
        }else{
            $statusMsg = "Il y a eu une erreur d'envoie";
        }
    }else{
        $statusMsg = 'Uniquement les fichiers JPG, JPEG, PNG, GIF, & PDF sont autorisé.';
    }
}else{
    $statusMsg = 'Ajouter une Image';
}

// Display status message
echo $statusMsg;
header('location: ../../../Index/Index.php');

