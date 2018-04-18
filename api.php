<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');


/*===============================
	API
===============================*/


if (empty($_GET['method'])) {
    $errors = ['error' => 1, 'message' => 'Invalid parameters'];

} else {
    $method = $_GET['method'];
}

if (empty($errors)) {
    if ($method == "music") {
        // method music
    } else if ($method == "tags") {
        // method tags
    } else if ($method == "comments") {
        // method comments
    } else if ($method == "likes") {
        // method likes
    } else {
        $errors = ['error' => 10, 'message' => 'Invalid Method'];
    }
} else {
    $data = $errors;
}

include 'view/api.php';
