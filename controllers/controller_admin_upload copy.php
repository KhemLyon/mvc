<?php
if (isset($_POST['submit'])) {
    $db = connectDB();
    $sql = $db->prepare("INSERT INTO picture (title, description, src, author) VALUES (?,?,?,?)");
    $sql->execute([
        $_POST['title'],
        $_POST['description'],
        $newFile,
        $_POST['author']
    ]);
    header("Location:?page=adminlist");
}
include "./views/layout.phtml";