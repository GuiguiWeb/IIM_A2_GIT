<?php
session_start();
require('../config/config.php');
require('../model/functions.fn.php');

define("PARAMETERSINVALID", 1);
define("ARTISTUNKNOWN", 2);

/*===============================
	TAGS
===============================*/

if (!empty($_GET['artist'])) {
    $artist = $_GET['artist'];
    if (getTagsByArtist($artist) != "The artist you supplied could not be found") {
        $tags = getTagsByArtist($artist);
    } else {
        $errors = ['error' => ARTISTUNKNOWN, 'message' => 'Artist unknown'];
    }
} else {
    $errors = ['error' => PARAMETERSINVALID, 'message' => 'Invalid parameters'];
}


if (empty($errors)) {
    foreach ($tags as $key => $value) {
        $data['tags'][$key] = $value->name;
    }
} else {
    $data = $errors;
}

include '../view/api.php';
