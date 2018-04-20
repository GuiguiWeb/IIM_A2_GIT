<?php
session_start();
require('../config/config.php');
require('../model/functions.fn.php');

define("PARAMETERSINVALID", 1);

/*===============================
	API
===============================*/

if (!empty($_GET['artist'])) {
    $artist = $_GET['artist'];
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}

if (empty($errors)) {
    $tags = getTagsByArtist($artist);
    foreach ($tags as $key => $value) {
        $data['tags'][$key] = $value->name;
    }
} else {
    $data = $errors;
}

include '../view/api.php';
