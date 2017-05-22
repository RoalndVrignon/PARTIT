<?php
require ('inc/header.php');
$errors = array();
require_once ('inc\db.php');
require ('inc/functions.php');

if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();
}

?>


<?php require ('inc/footer.php'); ?>

