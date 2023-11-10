<?php
//-----la config
require "./config.php";
//-----le routeur
require "./services/router.php";
//-----le controleur
require "./controllers/controller_{$page}.php";

