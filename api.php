<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');

define("PARAMETERSINVALID", 1);
define("METHODNOTAVAILABLE", 10);
define("METHODINVALID", 11);

/*===============================
	API
===============================*/

if (empty($_GET['method'])) {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
} else {
    $method = $_GET['method'];
}
if ($_GET['method'] === "music" AND !empty($_GET['id'])) {
    $musicId = $_GET['id'];
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}
if ($_GET['method'] === "tags" AND !empty($_GET['artist'])) {
    $artist = $_GET['artist'];
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}

if (empty($errors)) {
    if ($method == "music") {
        $data = selectMusic($db, $musicId);
    } else if ($method == "tags") {
        $data = getTagsByArtist($artist);
    } else if ($method == "comments") {
        $errors = ['error' => METHODNOTAVAILABLE, 'message' => 'Method "Comments" is not yet available'];
    } else if ($method == "likes") {
        $errors = ['error' => METHODNOTAVAILABLE, 'message' => 'Method "Likes" is not yet available'];
    } else {
        $errors = ['error' => METHODINVALID, 'message' => 'Invalid Method'];
    }
} else {
    $data = $errors;
}

include 'view/api.php';
