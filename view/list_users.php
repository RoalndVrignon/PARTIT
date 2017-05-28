<?php
require ('../inc/connectheader.php');
$errors = array();
require_once ('../inc\db.php');
require_once ('../inc/functions.php');

if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();
}

$req = $pdo->query('SELECT nom, prenom, email FROM users');
$users = $req->fetchAll(PDO::FETCH_OBJ);
?>
<section id="navbar1">
    <div class="container-fluid">
        <div class="row">
            <div id="sidebar">
                <div class="img-container text-center dgr-hover-pointer">
                    <img src="../img/user.png" alt="user">
                    <div class="text-name"><?= $_SESSION['auth']->prenom." ".$_SESSION['auth']->nom; ?></div>
                </div>
                <ul>
                    <li><a href="home.php">Accueil</a></li>
                    <li><a href="list_event.php">Liste des évènements</a></li>
                    <li><a href="list_users.php">Liste des utilisateurs </a></li>
                    <li><a href="logout.php">Se déconnecter</a></li>
                </ul>
                <div id="sidebar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $('#sidebar-btn').click(function(){
                        $('#sidebar').toggleClass('visible');
                    });
                });
            </script>
        </div>
    </div>
    </div>


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

    </section>

<?php require ('../inc/footer.php'); ?>

