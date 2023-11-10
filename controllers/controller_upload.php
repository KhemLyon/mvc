<!-- <php
$errors = [];
$errors [0]="Le fichier n'est pas dans un format valide";
$errors [1]="La taille du fichier est incorrect";
$errors []="Erreur 3";
$errors []="Erreur 4";

if (isset($_POST['upload'])) {
    $fileSize = $_FILES["image_file"]["size"];
    // on copie le fichier temporaire vers le fichier uploads
    // dans notre projet..
    $tempFile = $_FILES["image_file"]["tmp_name"];
    // on peut récupérer des infos sur le fichier temporaire avec getimagesize    
    $checkFile = getimagesize($tempFile);
    //utlisation d explode qui retourne un tableau de chaînes de caractères
    //sur le mime de $checkFile (faire un var_dump de $checkFile pour comprendre)
    //ainsi nous pouvons récupérer plusieurs types d'extension image
    $extension = explode("/",$checkFile['mime']);
    // si ce n'est pas une image, $chekFile retourne false !
    if ($checkFile) {
        // on précise le nom du fichier basé sur un timestamp avec time()
        $newFile = "./uploads/" . time() .".".$extension[1];
        move_uploaded_file($tempFile, $newFile);
    } else {
        echo $errors [0];
    }
    


}
include "./views/layout.phtml"; -->
