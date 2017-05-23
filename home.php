<!-- Navbar goes here -->
<?php
require ('inc/connectheader.php');
if(!isset($_SESSION['auth'])){
$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
header('Location: login.php');
exit();}
?>



<section class="home">

        <div class="container-fluid">
            <h1 class="title text-center">Organisez votre évênement</h1>
            <h2 class="text-center">n'a jamais été aussi simple.</h2>
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
        </div>
</section>

<section class="test">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>
<?php
require ('inc/footer.php');
?>


