<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/model/functions.fn.php');

define("PARAMETERSINVALID", 1);

/*===============================
	API
===============================*/

if (!empty($_GET['musicid'])) {
    $musicId = $_GET['musicid'];
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}

if (empty($errors)) {
    $data = ['error' => PARAMETERSINVALID, 'message' => "Method Comments is not yet available"];
} else {
    $data = $errors;
}

include '../view/api.php';
