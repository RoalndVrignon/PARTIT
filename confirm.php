<?php


$user_id = $_GET['id'];
$token= $_GET['token'];
require 'inc/db.php';
$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();

session_start();


if($user && $user->confirmation_token == $token ){
    $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
    $_SESSION['flash']['success']="Bravo, vous avez validé votre compte !";
    $_SESSION['auth'] = $user;
    $_SESSION['user_id']=$user->id;
    header('Location: account.php?id='.$user->id);
}
else{
    $_SESSION['flash']['danger']="Ce token n'est plus valide, veuillez créer un nouveau compte ou vous connecter avec vos identifiants.";
    header('Location: login.php');
}

