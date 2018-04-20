<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/model/functions.fn.php');

define("PARAMETERSINVALID", 1);

/*===============================
	API
===============================*/

if (!empty($_GET['id'])) {
    $musicId = $_GET['id'];
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}

if (empty($errors)) {
    $data = selectMusic($db, $musicId);
} else {
    $data = $errors;
}

include '../view/api.php';
