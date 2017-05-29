<?php
require ('../inc/connectheader.php');
require ('../inc/db.php');


if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();}

if(!empty($_POST)) {

    $errors = array();

    if (empty($_POST['nom'])) {
        $errors['nom'] = "Veuillez rentrer un nom";
    } else {
        $req = $pdo->prepare('SELECT id FROM event WHERE nom = ?');
        $req->execute([$_POST['nom']]);
        $user = $req->fetch();
    }

    if (empty($_POST['lieu'])) {
        $errors['lieu'] = "Veuillez rentrer un lieu";
        $_SESSION['flash']['danger'] = 'ca marche pas';

    } else {
        $req = $pdo->prepare('SELECT id FROM event WHERE lieu = ?');
        $req->execute([$_POST['lieu']]);
        $user = $req->fetch();
    }

    if (empty($_POST['date'])) {
        $errors['date'] = "Veuillez rentrer uen date";
    } else {
        $req = $pdo->prepare('SELECT id FROM event WHERE date = ?');
        $req->execute([$_POST['date']]);
        $user = $req->fetch();
    }

    if (empty($_POST['description'])) {
        $errors['description'] = "Veuillez rentrer une description";
    } else {
        $req = $pdo->prepare('SELECT id FROM event WHERE description = ?');
        $req->execute([$_POST['description']]);
        $user = $req->fetch();
    }


    if (empty($errors)) {
        if (empty($errors)) {
            $type=('SELECT id FROM event WHERE type = "Diner"');
            $req = $pdo->prepare("INSERT INTO event SET nom = ?, lieu =?, date = ?, description = ?, type='Diner'");
            $req->execute([$_POST['nom'], $_POST['lieu'], $_POST['date'], $_POST['description']]);

        }

    }

    header('Location: ../view/home.php');


}





?>

<section id="template">
    <div class="container-fluid">
        <div class="row">
            <div id="sidebar">
                <div class="img-container text-center dgr-hover-pointer">
                    <div class="text-name"><?= $_SESSION['auth']->prenom." ".$_SESSION['auth']->nom; ?></div>
                    <div class="text-name"><?= $_SESSION['auth']->email;?></div>

                </div>
                <ul>
                    <li><a href="../view/home.php">Accueil</a></li>
                    <li><a href="../view/list_event.php">Liste des évènements</a></li>
                    <li><a href="../view/list_users.php">Liste des utilisateurs </a></li>
                    <li><a href="../view/logout.php">Se déconnecter</a></li>
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

<div class="container" style="margin-top: 60px">
    <div class="row">
        <div class="col-md-6">
            <h2 class="template1">On va bien manger ce soir</h2></br>
            <h2 class="template2">PART'<span class="it">IT</span></h2>
        </div>
        <div class="col-md-6">
            <form action="" method="POST">

                <div class="row">
                    <div class="form-group">
                        <label for="">Donnez un nom à votre évenement</label>
                        <input type="text" name="nom" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="">Lieu</label>
                        <input type="text" name="lieu" class="form-control"   />
                    </div>

                    <div class="form-group">
                        <label for="">Date et Heure</label>
                        <input type="date" name="date" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="">Description de l'évenement</label>
                        <input type="text" name="description" class="form-control"   />
                    </div>


                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div id="go" class="button">
                            <a href="../view/home.php"><button type="submit" class="btn btn-primary">Continuez</button></a>
                        </div>

                    </div>
                </div>
            </form>



        </div>
    </div>


</div>


</section>




<?php
require ('../inc/footer.php');
?>


