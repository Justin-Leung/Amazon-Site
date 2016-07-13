<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300);
error_reporting(E_ALL);
ob_implicit_flush(true);

/* Main Imports */
include($_SERVER['DOCUMENT_ROOT'] . '/core/functions.php');
include($_SERVER['DOCUMENT_ROOT'] . '/setup.php');

$db = new mysqli($db_host, $db_username, $db_password, $db_name);

?>
