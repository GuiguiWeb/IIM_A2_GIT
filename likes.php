<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');

/*===============================
	Comments
===============================*/

if (!isset($_SESSION) OR empty($_SESSION)) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['musicid']) && !empty($_POST['musicid'])) {
    $musicid = htmlspecialchars($_POST['musicid']);
    $userid = $_SESSION['id'];
    addLike($db, $userid, $musicid);
    $_SESSION['message'] = 'Like posté !';
    header('Location: dashboard.php');
} else {
    $_SESSION['message'] = 'Erreur : Problème au niveau du like';
    header('Location: dashboard.php');
}
