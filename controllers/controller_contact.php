<!-- Ajout user -->
<?php
if (isset($_POST['creer'])) {
    $db = connectDB();
    $error = '';
    $password = 'password';
    $sql = $db->prepare("INSERT INTO users (email, password) VALUES (?,?)");
    $sql->execute([
        strip_tags($_POST['email']),
        strip_tags($_POST['password'])
        
    ]);
    header("Location:?page=succes");
}


include "./views/layout.phtml";







// <!-- Ajout article -->

// if (isset($_POST['submit'])) {
//     $db = connectDB();
//     $sql = $db->prepare("INSERT INTO picture (title, description, src, author) VALUES (?,?,?,?)");
//     $sql->execute([
//         $_POST['title'],
//         $_POST['description'],
//         $_POST['src'],
//         $_POST['author']
//     ]);
//     header("Location:?page=adminlist");
// }
// include "./views/layout.phtml";