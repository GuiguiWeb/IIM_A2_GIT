<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');

/*===============================
	Comments
===============================*/

 if(!isset($_SESSION) OR empty($_SESSION)){
     header('Location: login.php');
     exit();
 }

if (isset($_POST['userid']) && isset($_POST['musicid']) && isset($_POST['message']) && !empty($_POST['userid']) && !empty($_POST['musicid']) && !empty($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $musicid = htmlspecialchars($_POST['musicid']);
        $userid = htmlspecialchars($_POST['userid']);
        addComments($db, $userid, $musicid, $message);
        $_SESSION['message'] = 'Commentaire envoyé !';
        header('Location: dashboard.php');
} else {
    $_SESSION['message'] = 'Erreur : Formulaire incomplet';
    header('Location: dashboard.php');
}
