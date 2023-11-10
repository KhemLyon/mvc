<?php
session_start();

if (!isset($_SESSION['mail'])) {
    header("Location: template_log.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
</head>
<body>
    <h2>Bienvenue, <?php echo $_SESSION['mail']; ?> !</h2>
    <p>Contenu du tableau de bord...</p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
