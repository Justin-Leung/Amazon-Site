<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);


srand((double)microtime()*1000000);

for ($i=0; $i < 10; $i++) {
  echo RAND(1,10) . '<br>';
}

?>
