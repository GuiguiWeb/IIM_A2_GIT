<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/model/functions.fn.php');

define("PARAMETERSINVALID", 1);
define("MUSICIDINVALID", 2);

/*===============================
	COMMENTS
===============================*/

if (!empty($_GET['musicid'])) {
    $musicId = $_GET['musicid'];
    if (selectMusic($db, $musicId)) {
        $comments = getComments($db, $musicId);
    } else {
        $errors = ['error' => MUSICIDINVALID, 'message' => 'Music id invalid'];
    }
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}

if (empty($errors)) {
    $data['comments'] = $comments;
} else {
    $data = $errors;
}

include '../view/api.php';
