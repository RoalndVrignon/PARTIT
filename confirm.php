<?php


$user_id = $_GET['id'];
$token= $_GET['token'];
require 'inc/db.php';
require_once 'inc/functions.php';
$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();

session_start();


if($user && $user->confirmation_token == $token ){
    $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
    $pdo->prepare('INSERT INTO friends_relationship(user_id1, user_id2, status) VALUES (?, ?, ?)')->execute([$user->id, $user->id, '2']);
    $_SESSION['flash']['success']="Bravo, vous avez validé votre compte !";
    $_SESSION['auth'] = $user;
    $_SESSION['user_id']=$user->id;
    header('Location: account.php?id='.$user->id);
}
else{
    $_SESSION['flash']['danger']="Ce token n'est plus valide, veuillez créer un nouveau compte ou vous connecter avec vos identifiants.";
    header('Location: login.php');
}

