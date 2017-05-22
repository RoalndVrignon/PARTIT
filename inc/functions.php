<?php
require_once'db.php';

/*function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}*/

function str_random ($length){
    $alphabet="0987654321AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn";
    return substr (str_shuffle(str_repeat($alphabet,$length)), 0, $length);
}
//
//if(!function_exists('e')) {
//    function e($string)
//    {
//        if ($string) {
//            return htmlspecialchars($string);
//        }
//    }
//}
//if (!function_exists('find_user_by_id')){
//    function find_user_by_id($id){
//        global $pdo;
//
//        $req->$pdo->prepare('SELECT * FROM users WHERE id = ? ');
//        $req->execute([$id]);
//        $data = current($q->fetchAll(PDO::FETCH_OBJ));
//
//        $req->CloseCursor();
//        return $data;
//
//    }

/*
function logged_only(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = "Vous ne pouvez pas accéder à cette page";
        header('Location: login.php');
        exit();
    }*/
?>
