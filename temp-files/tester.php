<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');


$string = " , Master the art of letting go";
$sub = substr($string, 0, 2);
if (preg_match('/,/',$sub)) {
  $string = trim(substr($string, 2));
  echo $string;
}

/*
if(strpos(substr($string, 0, 2), ',')) {
  $string = substr($string, 2);
  echo $string;
}
*/

?>
