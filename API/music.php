<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/model/functions.fn.php');

define("PARAMETERSINVALID", 1);

/*===============================
	MUSIC
===============================*/

if (!empty($_GET['id'])) {
    $musicId = $_GET['id'];
    if (selectMusic($db, $musicId)) {
        $music = selectMusic($db, $musicId);
    } else {
        $errors = ['error' => MUSICIDINVALID, 'message' => 'Music id invalid'];
    }
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}

if (empty($errors)) {
    $data = $music;
} else {
    $data = $errors;
}

include '../view/api.php';
