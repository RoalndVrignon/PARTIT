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
            <h1 class="title text-center">Organiser votre évènement</h1>
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
            <div id="go" class="button text-center" style="margin-top: 100px">
                <a href="#template"><button type="button"class="js-scrollto go btn btn-lg btn-primary" href="#template"> Allez-y, c'est simple!</button></a>

            </div>

        </div>
</section>

<section class="template" id="template">
    <div id="vue-app">
        <h2>{{name}}</h2>
    </div>


    <div id="picker">
        <div class="container-fluid">
            <h1 class="text-center"> Quel type d'évènement? </h1>

            <form method="post" id="submit_template">
                <div id="genre-component">
                    <div class="sound-kind-picker-component">
                        <a href=""><li type="submit" class="kind-picker-select kind-picker">Barbecue</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Soirée alcoolisé</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Soirée non alcoolisé (BOOM)</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Dîner</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Soirée étudiante</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Anniversaire</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Pique-Nique</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Soirée en Ville</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Anniversaire surprise</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Plancha</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Soirée à pas beaucoup</li></a>
                        <a href=""><li class="kind-picker-select kind-picker">Foot</li></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="name">
</section>


<?php
require ('inc/footer.php');
?>


