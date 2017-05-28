<?php
require ('inc/db.php');
if (isset($_GET['id']) && isset($_GET['token'])){
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ? AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'], $_GET['token']]);
    $user = $req->fetch();
    if ($user){
        if (!empty($_POST)){
             if (!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                 $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                 $pdo->prepare('UPDATE users SET password = ?')->execute([$password]);
                 session_start();
                 $_SESSION['flash']['success']='Votre mot de passe a bien été modifé';
                 $_SESSION['auth'] = $user;
                 $_SESSION['user_id']=$user->id;
                 header('Location: edit_account.php?id='.$user->id);
                 exit();
             }
        }
    }else{
        session_start();
        $_SESSION['flash']['error']="Ce token n'est pas valide";
        header('location: login.php');
        exit();
    }
}else{
    header('location: login.php');
    exit();
}

?>


<?php require ('inc/header.php'); ?>
<div class="container">
    <h1>Réinitialisation du mot de passe</h1>

    <form action="" method="POST">


        <div class="row">

            <div class="form-group col-sm-12">
                <label for="">Mot-de-passe</label>
                <input type="password" name="password" class="form-control" />
            </div>

            <div class="form-group col-sm-12">
                <label for="">Confirmer mon mot-de-passe</label>
                <input type="password" name="password_confirm" class="form-control" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Changer mon mot de passe</button>

    </form>
</div>
<?php require ('inc/footer.php'); ?>
