<?php
require ('inc/db.php');
if (!empty($_POST) && !empty($_POST['email'])){

    require ('inc/functions.php');
    $req = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $req->execute(['email' => $_POST['email']]);
    $user = $req->fetch();
    if($user){
        session_start();
        $reset_token= str_random(60);
        $pdo->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
        $_SESSION['flash']['success']='Les instructions du rappel de mot de passe vous ont été envoyé par e-mail';
        mail($_POST['email'], 'Réinitialisation de votre mot de passe', "Afin de réinitialiser votre mot de passe, merci de cliquer sur ce lien\n\n http://localhost/projetfin/reset.php?id={$user->id}&token=$reset_token");
    }
    else{
        $_SESSION['flash']['danger']='Aucun compte à cette adresse mail ';
    };}

?>


<?php require ('inc/header.php'); ?>
<div class="container">
    <h1>Mot de passe oublié</h1>

    <form action="" method="POST">


        <div class="row">
            <div class="form-group col-sm-12">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control"   />
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Connecter</button>

    </form>
</div>
<?php require ('inc/footer.php'); ?>
