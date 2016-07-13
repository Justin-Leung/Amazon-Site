<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');

$directory = file_get_html('https://canopy.co/');

?>
