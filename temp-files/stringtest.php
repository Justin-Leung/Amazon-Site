<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);

$phrase = str_replace(' ', '+', trim($phrase));
return $phrase;

?>
