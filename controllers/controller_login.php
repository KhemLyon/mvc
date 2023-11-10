<?php
$error = "";
if (isset($_POST['submit'])){
    $email = strip_tags($_POST['email']);
    $db = connectDB();
    $sql = $db->prepare("SELECT * FROM users WHERE email=?");
    $sql->execute([$email]);
    $user = $sql->fetch(PDO::FETCH_ASSOC);
    if ($sql->rowCount() == 0){
        $error = "Vous n'avez pas de compte veuillez pour <a href=\"?page=register\">enregistrer</a> svp.";
    }
    $passVerif = password_verify(strip_tags($_POST['password']),$user['password']);
    if (!$passVerif){
        $error = "Désolé Login/Mot-de-passe incorrect(s).";
    }
    if (empty($error)){
        $_SESSION['user'] = $user;
        header("Location:?page=adminlist");
    }
}

// --- la vue
include "./views/layout.phtml";