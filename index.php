<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/noconnect.css" rel="stylesheet">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>


</head>

<body>
<nav class="navbar-default navbar-inverse" style="background-color: #2c3e50">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="view/index.php">Soir'it</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav ri">
                <?php if(isset($_SESSION['auth'])): ?>
                    <li><a href="view/logout.php">Déconnecter</a></li>
                <?php else: ?>
                    <li><a href="view/register.php">S'inscrire</a></li>
                    <li><a href="view/login.php">Se connecter</a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach ($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type;?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset ($_SESSION['flash'])?>
    <?php endif; ?>
</div>


<section class="home">

    <div class="container-fluid">
        <h1 class="title text-center">Organiser votre évênement</h1>
        <h2 class="text-center">en seulement 4 étapes</h2>
        <div class="row">
            <div class="col-sm-6 col-xs-6 col-md-3 text-center">
                <img class=" cercle" src="icon/overlap.png">
            </div>
            <div class="col-sm-6 col-xs-6 col-md-3 text-center">
                <img class="cercle" src="icon/glass.png">
            </div>
            <div class="col-sm-6 col-xs-6 col-md-3 text-center">
                <img class="cercle" src="icon/add-user.png">
            </div>
            <div class="col-sm-6 col-xs-6 col-md-3 text-center">
                <img class="cercle" src="icon/overlap.png">
            </div>
        </div>
        <div id="go" class="button text-center" style="margin-top: 100px">
            <a href="view/login.php"<button type="button"class="btn btn-lg btn-primary" > Se connecter</button></a>
            <a href="view/register.php"><button type="button"class="btn btn-lg btn-primary"> S'inscrire</button></a>

        </div>

    </div>
</section>

<?php require 'inc/footer.php'; ?>
