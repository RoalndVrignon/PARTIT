<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require ('functions.php');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Raleway" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#submit_template').submit(function () {
                alert ("tst");
            })
        });
    </script>
</head>
<body>

<?php if(isset($_SESSION['flash'])): ?>
    <?php foreach ($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type;?>">
            <?= $message; ?>
        </div>
    <?php endforeach; ?>
    <?php unset ($_SESSION['flash'])?>

    <?php
    if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();}?>

<?php endif; ?>


<-- Left section

    <nav id="nav-lateral" class="text-center">
            <div class="img-container text-center dgr-hover-pointer">
                <img style="height: 100px; margin-top: 10px;" src="img/user.png"><br/>
                <div class="text-name"><?= $_SESSION['auth']->prenom." ".$_SESSION['auth']->nom; ?></div>
            </div>
        <div class="navbar" style="margin-top: 30px;">
            <div class="discover">
                <h3>part'it</h3>
                    <ul class="nav navbar-nav">
                                <li><a href="home.php">Accueil <span class="sr-only">(current)</span></a></li><br/>
                                <li><a href="list_users.php">Liste des utilisateurs</a></li><br/>
                                <li><a href="list_users.php">Mes Amis</a></li>
                                <li><a href="edit_account.php">Editer mon profil</a></li><br/>
                                <li role="separator" class="divider" style="color: red"></li><br/>
                                <li><a href="logout.php">Se déconnecter</a></li><br/>
                    </ul>
            </div>

        </div>
    </nav>
<-- Right section
    <div class="container"  style="Position: relatif;" id="cote-droit">

