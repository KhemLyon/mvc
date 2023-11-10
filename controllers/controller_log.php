<?php
// Se connecter à la base de données
// $pdo = new PDO('mysql:host=.DB_HOST;dbname=.DB_NAME', 'mail', 'password');

// const DB_HOST="localhost";
// const DB_NAME = "bdd_images_tp";
// const DB_USER = "root";
// const DB_PASS = "";
// function connectDB(): PDO{
//     $db = new PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
//     return $db;
// }

// Récupérer les données du formulaire
$mail = $_POST['mail'];
$password = $_POST['password'];

// Requête pour vérifier les informations d'identification
$query = "SELECT * FROM users WHERE mail = ? AND password = ?";
$stmt = $db->prepare($query);
$stmt->execute([$mail, $password]);
$user = $stmt->fetch();

if ($user) {
    // L'utilisateur est authentifié avec succès
    session_start();
    $_SESSION['mail'] = $user['password'];
    header("Location: template_home.phtml"); // Rediriger vers la page d'accueil après la connexion
} else {
    // L'authentification a échoué
    header("Location: login.php?erreur=1");
}
include "./views/layout.phtml";
?>
