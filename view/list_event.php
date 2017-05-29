<?php
require ('../inc/connectheader.php');
$errors = array();
require_once ('../inc/db.php');
require_once ('../inc/functions.php');

if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();
}
?>

    <section id="nav_event">
        <div class="container-fluid">
            <div class="row">
                <div id="sidebar">
                    <div class="img-container text-center dgr-hover-pointer">
                        <div class="text-name"><?= $_SESSION['auth']->prenom." ".$_SESSION['auth']->nom; ?></div>
                        <div class="text-name"><?= $_SESSION['auth']->email; ?></div>

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
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Liste des événements</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 rectangle">
                        <?php

                        $req = $pdo->query('SELECT nom, date, lieu, description, type FROM event');
                        $events = $req->fetchAll(PDO::FETCH_OBJ);
                        ?>

                        <?php foreach ($events as $event):?>
                            <div class="user-block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 center nom"><h5><?= ($event->nom)?></h5></div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 date"><h5 class="text-center">Date:</h5><?= ($event->date)?></div>
                                        <div class="col-md-4 lieu"><h5 class="text-center">Lieu:</h5><?= ($event->lieu)?></div>
                                        <div class="col-md-4 type"><h5 class="text-center">Type:</h5><?= ($event->type)?></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 center nom"><h5 class="text-center">Description:</h5><?= ($event->description)?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
    </section>






<?php require ('../inc/footer.php'); ?>