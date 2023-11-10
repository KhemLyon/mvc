<!-- <php
$db = connectDB();
$sql = $db->prepare("SELECT * FROM picture Orders LIMIT 3");
$sql->execute();
$pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
include "./views/layout.phtml"; -->


<?php
require_once("./models/Picture.php");
$pictures = Picture::getAll();
include "./views/layout.phtml";