<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');


/*===============================
	API
===============================*/


if (empty($_GET['method']) OR empty($_GET['id'])) {
    $errors = ['error' => 1, 'message' => 'Invalid parameters'];

} else {
    $method = $_GET['method'];
    $musicId = $_GET['id'];
}

if (empty($errors)) {
    if ($method == "music") {
        $data = selectMusic($db, $musicId);
    } else if ($method == "tags") {
        // method tags
    } else if ($method == "comments") {
        $errors = ['error' => 9, 'message' => 'Method "Comments" is not yet available'];
    } else if ($method == "likes") {
        $errors = ['error' => 9, 'message' => 'Method "Likes" is not yet available'];
    } else {
        $errors = ['error' => 10, 'message' => 'Invalid Method'];
    }
} else {
    $data = $errors;
}

include 'view/api.php';
