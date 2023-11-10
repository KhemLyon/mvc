<?php
require_once("./services/database.php");

class Picture{
    public static function getAll()
    {
       $pictures = [];
       $db = connectDB();
       $sql = $db->prepare("SELECT * FROM picture ORDER BY id DESC");
       $sql->execute();
       $pictures = $sql->fetchAll(PDO::FETCH_ASSOC);
       return $pictures;
    }
}