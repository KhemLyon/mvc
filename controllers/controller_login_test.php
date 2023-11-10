<!-- Ajout user -->
<!-- <php -->
<!-- // if (isset($_POST['creer'])) {
    // $db = connectDB();
    // $password = 'password';
    // $sql = $db->prepare("INSERT INTO users (name, mail, password) VALUES (?,?,?)");
    // $sql->execute([
        // stripslashes($_POST['name']),
        // stripslashes($_POST['mail']),
        // stripslashes($_POST['password'])
        
    // ]);
    // header("Location:?page=succes");
// }
// VALIDATION FORMULAIRE -->
<?php
$db = connectDB();
$sql = $db->prepare("SELECT * FROM users WHERE mail = ? AND password = ?");
$sql->execute(['mail','password']);
$user = $sql->fetchAll(PDO::FETCH_ASSOC);
$errorMessage ="";


// Validation du formulaire
if (isset($_POST['email']) &&  isset($_POST['password'])) {

    foreach ($users as $user) {
        if (
            $user['mail'] === $_POST['mail'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'mail' => $user['mail'],
            ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['mail'],
                $_POST['password']
            );
        }
    }
}
?>


<!-- // Si utilisateur/trice est non identifié(e), on affiche le formulaire -->

<?php if(!isset($loggedUser)): ?>
<form action="home.php" method="post">
    <!-- // si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
        <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<!-- // Si utilisateur/trice bien connectée on affiche un message de succès -->

<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $loggedUser['mail']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>