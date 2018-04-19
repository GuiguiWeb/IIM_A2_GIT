<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if (isset($_POST['userid']) && isset($_POST['message'])) {
    if (!empty($_POST['userid']) && !empty($_POST['message'])) {

        $message = htmlspecialchars($_POST['message']);
        $userid = htmlspecialchars($_POST['userid']);

        addComments($db, $userid, $message);

        dump(addComments($db, $userid, $message));

    }

} else {
    $_SESSION['message'] = 'Erreur : Formulaire incomplet';
    header('Location: dashboard.php');
}


