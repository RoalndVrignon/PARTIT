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

//if (empty($_POST['nom'])){
//    $errors['nom'] = "Vous devez rentrer un mot de passe valide";
//}
//
//if (!empty($errors)) {
//    $req = $pdo->prepare('UPDATE users SET nom WHERE id = ?');
//    $id = $_GET['id'];
//    $user = $req->execute(['nom' => $_POST['nom']]);
//    $_SESSION['flash']['success'] = "ç'est bon";
//}else {
//    $_SESSION['flash']['danger'] = "ç'est bon";
//}
//
require ('inc/db.php');

if (empty($_POST['nom'])){
    $errors['nom'] = "Vous devez rentrer un mot de passe valide";
}

if (!empty($_POST) && !empty($_POST['nom'])){

    require_once ('inc/functions.php');
    $req = $pdo->prepare('SELECT nom FROM users WHERE nom = ?');
    $req->execute(['nom' => $_POST['nom']]);
    $user = $req->fetch();
    if(!empty($errors)){
        $req = $pdo->prepare('UPDATE users SET nom WHERE nom = ?');
        $req->execute();
        $_SESSION['flash']['success'] = "ç'est bon";
        exit();
    }
    else{
        $_SESSION['flash']['danger']='Identifiant ou mot de passe incorrecte';
    };}
    ?>



<form action="" method="POST">

<div id="main content" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profil de <?= $_SESSION['auth']->prenom." ".$_SESSION['auth']->nom; ?></h3>
                        </div>
                        <div class="panel-body">
                            Image <br>
                            Adresse mail <br>

                            Panel content
                        </div>
                    </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Compléter mon profil</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" autocomplete="off">
                            <div class="row">
<!--                                <div class="col-sm-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="name">Prénom<span class="text-danger">*</span></label>-->
<!--                                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="--><!--" required="required"/>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" name="nom" class="form-control />
                                    </div>
                                </div>
                            </div>
<!--                            <div class="row">
<!--                                <div class="col-sm-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="name">Ville<span class="text-danger">*</span></label>-->
<!--                                        <input type="text" name="city" id="city" class="form-control" placeholder="Paris" required="required"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="name">Pays<span class="text-danger">*</span></label>-->
<!--                                        <input type="text" name="country" id="country" class="form-control" placeholder="France" required="required"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="col-sm-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="name">Facebook<span class="text-danger">*</span></label>-->
<!--                                        <input type="text" name="fb" id="fb" class="form-control" placeholder="Paris" required="required"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="name">Twitter<span class="text-danger">*</span></label>-->
<!--                                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="France" required="required"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="row">-->
<!--                                <div class="col-sm-12">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="bio">-->
<!--                                            Biographie<span class="text-danger">*</span>-->
<!--                                        </label>-->
<!--                                        <textarea name="bio"rows="4" class="form-control" placeholder="Julien Dupont, 24 ans, fan des marseillais c'est les plus beau, les anges c'est nul">-->
<!--                                        </textarea>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary text-center" value="Valider" name="Update">Valider</button>
</div>

    </form>
