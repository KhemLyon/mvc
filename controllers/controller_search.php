<?php
$db = connectDB();
// on récupère la chaine de recherche depuis l'url
// on la convertit en texte en enlevant les espace...
$keywords = strtolower(strval(urldecode(trim($_GET['keywords']))));
$sql = $db->prepare("SELECT * FROM picture WHERE title LIKE '%".$keywords."%' OR description LIKE '%".$keywords."%' OR src LIKE '%".$keywords."%' OR author LIKE '%".$keywords."%'");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
// --- on charge la vue
include "./views/layout.phtml";