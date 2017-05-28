<?php
require ('inc/db.php');


if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){

    require ('inc/functions.php');
    $req = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $req->execute(['email' => $_POST['email']]);
    $user = $req->fetch();
    if(password_verify($_POST['password'], $user->password)){
        session_start();
        $_SESSION['auth']=$user;
        $_SESSION['user_id']=$user->id;
        $_SESSION['flash']['success']='Vous êtes connecté';
        header('Location: home.php?id='.$user->id);
        exit();
    }
    else{
        $_SESSION['flash']['danger']='Identifiant ou mot de passe incorrecte';
    };}

?>


<?php require ('inc/header.php'); ?>
<div class="container">
    <h1>Se connecter</h1>

    <form action="" method="POST">


        <div class="row">
            <div class="form-group col-sm-12">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control"   />
            </div>

            <div class="form-group col-sm-12">
                <label for="">Mot-de-passe<a href="forget.php">(J'ai oublié mon mot de passe)</a></label>
                <input type="password" name="password" class="form-control" />

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Connecter</button>

    </form>
</div>
<?php require ('inc/footer.php'); ?>
