<?php
require ('../inc/connectheader.php');
if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page. Veuillez vous connecter d'abord";
    header('Location: login.php');
    exit();}

if(!empty($_POST)) {

    $errors = array();
    require '..\inc\db.php';

    if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['nom'])) {
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
        $req = $pdo->prepare("INSERT INTO event SET nom = ?, lieu =?, date = ?, description = ? ");
        $req->execute([$_POST['nom'], $_POST['lieu'], $_POST['date'], $_POST['description']]);

    }

}





?>



<h1 class="text-center">Vous voulez organiser un barbecue ?</h1>


<div id="formulaire" class="container-fluid">

<form action="" method="POST">

    <div class="row">
        <div class="form-group col-sm-8 col-sm-offset-2">
            <label for="">Donnez un nom à votre évènement</label>
            <input type="text" name="nom" class="form-control" />
        </div>

    <div class="row">
        <div class="form-group col-sm-12">
            <label for="">Lieu</label>
            <input type="text" name="lieu" class="form-control"   />
        </div>

        <div class="form-group col-sm-12">
            <label for="">Date et Heure</label>
            <input type="date" name="date" class="form-control" />
        </div>

        <div class="form-group col-sm-12">
            <label for="">Descriptiond de l'évenement</label>
            <input type="text" name="description" class="form-control"   />
        </div>


    </div>

<!--        <div class="container-fluid">-->
<!--            <h2>Conviez les invités à ramener :</h2>-->
<!---->
<!--                <input type="checkbox" id="cbox1" value="checkbox1">-->
<!--                <label>Chipolatas</label>-->
<!---->
<!---->
<!--            <input type="checkbox" id="cbox2" value="checkbox1">-->
<!--                <label for="cbox2">Saucisses</label>-->
<!---->
<!--            <input type="checkbox" id="cbox2" value="checkbox1">-->
<!--            <label for="cbox2">Boissons</label>-->
<!---->
<!--            <input type="checkbox" id="cbox2" value="checkbox1">-->
<!--            <label for="cbox2">Boissons alcoolisés</label>-->
<!---->
<!--            <input type="checkbox" id="cbox2" value="checkbox1">-->
<!--            <label for="cbox2">Pain</label>-->
<!---->
<!--            <input type="checkbox" id="cbox2" value="checkbox1">-->
<!--            <label for="cbox2">Salades</label>-->
<!---->
<!--            <input type="checkbox" id="cbox2" value="checkbox1">-->
<!--            <label for="cbox2">Salades</label>-->
<!---->
<!--        </div>-->

        <div id="go" class="button text-center">
            <button type="submit" class="btn btn-primary">Continuez</button>

        </div>



    </div>
</form>

</div>
