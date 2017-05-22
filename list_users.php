<?php
require ('inc/connectheader.php');
$errors = array();
require_once ('inc\db.php');
require_once ('inc/functions.php');

if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();
}

$req = $pdo->query('SELECT nom, prenom, email FROM users');
$users = $req->fetchAll(PDO::FETCH_OBJ);
?>

<div class="main-content">
    <div class="container">
        <h1>Liste des utilisateurs</h1>

        <?php foreach ($users as $user):?>
            <div class="user-block">
                <?= ($user->prenom)?>
                <?= ($user->nom)?>
                <?= ($user->email)?>
                <br/>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php require ('inc/footer.php'); ?>

