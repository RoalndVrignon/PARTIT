<!-- Navbar goes here -->
<?php
require ('../inc/connectheader.php');
if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();}
?>

<section id="navbar1">
    <div class="container-fluid">
        <div class="row">
            <div id="sidebar">
                <div class="img-container text-center dgr-hover-pointer">
                    <div class="text-name"><?= $_SESSION['auth']->prenom." ".$_SESSION['auth']->nom; ?></div>
                    <div class="text-name"><?= $_SESSION['auth']->email;?></div>

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


<div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="title">Organiser votre événement</h2>
                <h3 class="title">n'a jamais été aussi simple.</h3>
            </div>
        </div>
        <div class="row">
            <div class=" col-xs-12 col-sm-12 col-md-12 arrow">
                <a href="#home2" class="js-scroll-to"><img src="../img/back.png"></a>
            </div>
        </div>
</div>
</section>

<section id="home2">
    <div class="container-fluid home2begin">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <h3 class="title">Choisissez votre évènement</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/barbecue.php"><img src="../img/barbecue.png" alt="icon"></a><div class="text-center">Barbecue</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/alcool.php"> <img src="../img/glass.png" alt="icon"></a> <div class="text-center">Soirée alcoolisé</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/noalcool.php"><img src="../img/no-drinks.png" alt="icon"></a> <div class="text-center">Soirée sans alcool</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/diner.php"><img src="../img/dining-room.png" alt="icon"></a> <div class="text-center">Dîner</div></div>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/etudiante.php"><img src="../img/student.png" alt="icon"></a> <div class="text-center">Soirée étudiante</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/surpise.php"><img src="../img/gift.png" alt="icon"></a> <div class="text-center">Anniversaire</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/piquenique.php"><img src="../img/basket.png" alt="icon"></a> <div class="text-center">Pique-nique</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/enville.php"><img src="../img/cityscape.png" alt="icon"></a> <div class="text-center">Soirée en ville</div></div>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/surpise.php"><img src="../img/boy.png" alt="icon"></a> <div class="text-center">Soirée surprise</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/chill.php"><img src="../img/livingroom.png" alt="icon"> </a><div class="text-center">Soirée chill</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/film.php"><img src="../img/popcorn.png" alt="icon"></a> <div class="text-center">Soirée film</div></div>
            <div class="col-md-3 col-xs-6 col-sm-6"> <a href="../template/sport.php"><img src="../img/american-football.png" alt="icon"> </a><div class="text-center">Sport</div></div>
        </div>
</section>


<?php
require ('../inc/footer.php');
?>