<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ob_implicit_flush(true);
error_reporting(0);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');

$amazon_page = file_get_html('https://www.amazon.com/Best-Sellers-Electronics-Accessories-Supplies/zgbs/electronics/281407/ref=zg_bs_nav_e_1_e');

echo $amazon_page->find('.zg_reviews', 0)->children(0)->children(0)->children(0)->children(0)->plaintext;

?>
