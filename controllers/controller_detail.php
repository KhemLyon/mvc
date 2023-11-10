<?php
$db = connectDB();
// on récupère l'id depuis l'url
// on la convertit en entier avec INTVAL pour être plus prudent...
$id = intval( $_GET['id'] );
$sql = $db->prepare("SELECT * FROM picture WHERE id='".$id."'");
$sql->execute();
// LE FETCH TOUT COURT NE RETOURNE QU'UN SEUL ARRAY PLAT (différent du FETCHALL)
$pic = $sql->fetch(PDO::FETCH_ASSOC);
// --- on charge la vue
include "./views/layout.phtml";