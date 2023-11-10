<?php
// Si l'id est dans l'url on delete dans la table
if (isset($_GET['id'])){
    $id = intval( $_GET['id'] );
    $db = connectDB();
    $sql = $db->prepare("DELETE FROM picture WHERE id=?");
    $sql->execute([$id]);
    unlink("./uploads/$newFile");
    // Et on redirige sur l'admin_list
    header("Location:?page=adminlist");
}

