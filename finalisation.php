<?php
require ('inc/connectheader.php');
$errors = array();
require_once ('inc/functions.php');
require ('inc/db.php');

if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();
}

?>


<div class="container-fluid">
    <?= $_SESSION['auth']->date;?>
</div>

<?php
require ('inc/footer.php');
?>


