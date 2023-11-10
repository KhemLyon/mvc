<?php
// Si $_SESSION['user'] n'est pas défini on redirige sur le login
// if (!isset($_SESSION['user'])) header("Location:?page=login");
$errors = [];
$upload_max_filesize =  ini_get('upload_max_filesize');

// Si le formulaire est validé on va tenter l'upload et on insert dans la table
if (isset($_POST['submit'])) {
    /*
    TRAITEMENT DU FICHIER POUR GERER L'UPLOAD
    */
    $titre=$_POST['title'];
    $fileName= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-',$titre)));
    $tempFile = $_FILES["src"]["tmp_name"];
    $fileType = $_FILES["src"]["type"];
    $fileSize = $_FILES["src"]["size"];
    $acceptedType = ["png", "jpeg"];
    $tabFileName = !empty($fileType) ? explode("/", $fileType) : [1 => ""];
    $fileExt = $tabFileName[1];

    if ($fileSize > $upload_max_filesize) {
        $errors[] = "Le fichier est trop gros !";
    }

    if (empty($fileSize)) {
        $errors[] = "Fichier non traité. Vérifiez éventuellement qu'il ne soit pas trop gros...";
    }

    if (!in_array($fileExt, $acceptedType)) {
        $errors[] = "Le fichier doit être un .jpg, .jpeg ou .png uniquement";
    }

    if (empty($errors)) {
        $newFile = "./uploads/" . $fileName . "." . $fileExt;
        if (@move_uploaded_file($tempFile, $newFile)) {
            $success = true;
        } else {
            $errors[] = "Erreur lors de l'upload du fichier :(";
        }
    }
    /*
    FIN DU TRAITEMENT DU FICHIER POUR GERER L'UPLOAD
    */

    if (empty($errors)) {
        $db = connectDB();
        $sql = $db->prepare("INSERT INTO picture (title, description, src, author) VALUES (?,?,?,?)");
        $sql->execute([
            $_POST['title'],
            $_POST['description'],
            $newFile,
            $_POST['author']
        ]);
        // Et on redirige sur l'admin_list
        header("Location:?page=admin_list");
    }
}

// --- la vue
include "./views/layout.phtml";
