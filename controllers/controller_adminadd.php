<?php
// Si $_SESSION['user'] n'est pas défini on redirige sur le login
if (!isset($_SESSION['user'])) header("Location:?page=login");
// Si le formulaire est validé on insert dans la table
$errors=[];
// Si le formulaire est validé on va tenter l'upload et on insert dans la table
if (isset($_POST['submit'])){

    if (isset($_POST['upload'])) {

        $tempFile = $_FILES["image_file"]["tmp_name"];
        $fileType = $_FILES["image_file"]["type"];
        $fileSize = $_FILES["image_file"]["size"];
        $acceptedType = ["png", "jpeg"];
        $tabFileName = !empty($fileType) ? explode("/", $fileType) : [1 => ""];
        $fileExt = $tabFileName[1];
    
        if ($fileSize > $upload_max_filesize) {
            $errors[] = "Le fichier est trop gros !";
        }
    
        if (empty($fileSize)) {
            $errors[] = "Fichier non traité. Vérifiez éventuellement qu'il ne soit pas trop gros...";
        }
    // checkez dans un tableau
        if (!in_array($fileExt, $acceptedType)) {
            $errors[] = "Le fichier doit être un .jpg, .jpeg ou .png uniquement";
        }
    
        if (empty($errors)) {
    
            $newFile = "./uploads/" . time() . "." . $fileExt;
            if (@move_uploaded_file($tempFile, $newFile)) {
                $success = true;
            } else {
                $errors[] = "Erreur lors de l'upload du fichier :(";
            }
        }
    }
}


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

// --- la vue
include "./views/layout.phtml";