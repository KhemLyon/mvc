<?php
if (isset($_POST['submit'])) {
    $db = connectDB();
    $sql = $db->prepare("INSERT INTO picture (title, description, src, author) VALUES (?,?,?,?)");
    $sql->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['src'],
        $_POST['author']
    ]);
    header("Location:?page=adminlist_test");
}
include "./views/layout.phtml";
?>


include "./views/layout.phtml";