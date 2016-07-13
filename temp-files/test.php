<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');

//$product_number = 3;
for ($product_number=14; $product_number <= 17; $product_number++) {
  $html = file_get_html('http://www.amazon.com/Best-Sellers/zgbs/');   // Get Page Contents
  $product_link = $html->find('.zg_title', $product_number)->innertext; // Raw Product Link
  $rating = $html->find('.a-icon-alt', $product_number)->plaintext; // Product Rating
  $sxml = simplexml_load_file("http://$_SERVER[HTTP_HOST]" . '/access.php?q=' . getASIN($product_link));

  if(is_object($sxml->Items->Item->ItemAttributes->Binding)) {
    $niche = $sxml->Items->Item->ItemAttributes->Binding;
    $name = $sxml->Items->Item->ItemAttributes->Title;
    $price = $sxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice;

    if($sxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice == '') {
      $price = $sxml->Items->Item->OfferSummary->LowestNewPrice->FormattedPrice;
    } else {
      $price = $sxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice;
    }

    $url = $sxml->Items->Item->DetailPageURL;
    $image = $sxml->Items->Item->LargeImage->URL;
    echo '<b>Product Name: </b>' . $name . '<br><br>';
    echo '<b>Link: </b>' . $url . '<br><br>';
    echo '<b>Niche: </b>' . $niche . '<br><br>';
    echo '<b>Price: </b>' . $price . '<br><br>';
    echo '<b>Rating: </b>' . $rating;
    echo '<br><img src="' . $image . '"><br><br>';
  } else {
    $niche = $sxml->Items->Item[3]->ItemAttributes->Binding;
    $name = $sxml->Items->Item[3]->ItemAttributes->Title;
    $price = $sxml->Items->Item[3]->ItemAttributes->ListPrice->FormattedPrice;

    if($sxml->Items->Item[3]->ItemAttributes->ListPrice->FormattedPrice == '') {
      $price = $sxml->Items->Item[3]->OfferSummary->LowestNewPrice->FormattedPrice;
    } else {
      $price = $sxml->Items->Item[3]->ItemAttributes->ListPrice->FormattedPrice;
    }

    $url = $sxml->Items->Item[3]->DetailPageURL;
    $image = $sxml->Items->Item[3]->LargeImage->URL;
    echo '<b>Product Name: </b>' . $name . '<br><br>';
    echo '<b>Link: </b>' . $url . '<br><br>';
    echo '<b>Niche: </b>' . $niche . '<br><br>';
    echo '<b>Price: </b>' . $price . '<br><br>';
    echo '<b>Rating: </b>' . $rating;
    echo '<br><img src="' . $image . '"><br><br>';
  }
}

?>
