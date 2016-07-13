<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.amazon.com/DBPOWER-Waterproof-Improved-Batteries-Accessories/dp/B01464D2W8/ref=zg_bsms_photo_home_3/181-0246273-2480217');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_exec($ch);

$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

curl_close($ch);

echo $url;


?>
