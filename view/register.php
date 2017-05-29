<?php require_once ('../inc/functions.php');
require ('../inc/db.php');

?>

<?php
session_start();
if(!empty($_POST)){

    $errors = array();

    if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['nom'])){
        $errors['nom'] = "Veuillez rentrer votre Nom de famille";
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE nom = ?');
        $req->execute([$_POST['nom']]);
        $user = $req->fetch();
    }

    if (empty($_POST['prenom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['prenom'])){
        $errors['prenom'] = "Veuillez rentrer votre prénom";
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE prenom = ?');
        $req->execute([$_POST['prenom']]);
        $user = $req->fetch();
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Veuillez rentrer un email valide";
    }else {
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if ($user) {
            $errors['email'] = 'Cet email est déjà utilisé pour un autre compte, veuillez en utiliser un autre';
        }
    }


    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password'] = "Vous devez rentrer un mot de passe valide";
    }

    if(empty($errors)){
        $req = $pdo->prepare("INSERT INTO users SET nom = ?, prenom =?, password = ?, email = ?, confirmation_token = ?, reset_token = ? ");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $headers = "From roland.vrignon@gmail.com";
        $token = str_random('60');
        $req->execute([$_POST['nom'], $_POST['prenom'], $password , $_POST['email'], $token, $token ] );
        $user_id = $pdo->lastInsertId();
        if(mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte, merci de cliquer sur ce lien\n\n http://localhost/partit/view/confirm.php?id=$user_id&token=$token, $headers")
    ){
            $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé afin de valider votre compte';
            ;}
        else {
            $_SESSION['flash']['danger'] = 'Un email de confirmation vous a été envoyé afin de valider votre compte';
            ;}


        header('Location: login.php');
        die('Bravo! Votre compte à bien été crée');
    }

}


?>

<?php require ('../inc/header.php'); ?>


<div class="container">
<h1>S'inscrire</h1>

    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>

        <ul>
            <?php foreach ($errors as $error):?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

<form action="" method="POST">

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="">Nom</label>
                <input type="text" name="nom" class="form-control" />
            </div>

            <div class="form-group col-sm-6">
                <label for="">Prénom</label>
                <input type="text" name="prenom" class="form-control" />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control"   />
            </div>

            <div class="form-group col-sm-12">
                <label for="">Mot-de-passe</label>
                <input type="password" name="password" class="form-control" />
            </div>

            <div class="form-group col-sm-12">
                <label for="">Confirmez votre Mot-de-passe</label>
                <input type="password" name="password_confirm" class="form-control"   />
            </div>
        </div>

    <button type="submit" class="btn btn-primary">M'inscrire</button>

</div>
</form>

<?php require '../inc/footer.php'; ?>
