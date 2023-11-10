<?php
require_once("./models/Picture.php");
$pictures = Picture::getAll();
include "./views/layout.phtml";
