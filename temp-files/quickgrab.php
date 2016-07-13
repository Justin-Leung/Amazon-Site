<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');

$page = array('http://www.amazon.com/Best-Sellers/zgbs/', 'http://www.amazon.com/gp/new-releases/', 'http://www.amazon.com/gp/movers-and-shakers/', 'http://www.amazon.com/gp/most-wished-for/', 'http://www.amazon.com/gp/most-gifted/');

$html = file_get_html($page[1]); // Get Page Contents

for ($i=0; $i <= 16; $i++) {
  $link = $html->find('.zg_title', $i)->innertext; // Raw Product Link
  $name = $html->find('.zg_title', $i)->plaintext; // Raw Product Link
  $asin = getASIN($link); // Retrieves Product ASIN
  $sxml = simplexml_load_file("http://$_SERVER[HTTP_HOST]" . '/access.php?q=' . $asin);

  if(isset($html->find('.a-icon-alt', $i)->plaintext)) {
    $rating = $html->find('.a-icon-alt', $i)->plaintext; // Product Rating
  }

  if(!isset($sxml->Items->Request->Errors->Error->Message)) { // Checks If Product Search Was Successful
    if(isset($sxml->Items->Item) ) { // If Item Exists
      foreach ($sxml->Items->Item as $Item) { // Loops To Find Proper XML Values

         $product = isset($Item->ItemAttributes->Title) ? $asin . '<br>' . $Item->ItemAttributes->Title . '<br>' : '';
         $niche = isset($Item->ItemAttributes->Binding) ? $Item->ItemAttributes->Binding . '<br>' : '';
         $url = isset($Item->DetailPageURL) ? $Item->DetailPageURL . '<br>' : '';
         $image = isset($Item->LargeImage->URL) ? $Item->LargeImage->URL . '<br>' : '';

         if(isset($Item->LargeImage->URL)) {
           $image = $Item->LargeImage->URL;
         } elseif(isset($Item->ImageSets->ImageSet->LargeImage->URL)) {
           $image = $Item->ImageSets->ImageSet->LargeImage->URL;
         }

         if(isset($Item->ItemAttributes->ListPrice->FormattedPrice)) {
           $price = $Item->ItemAttributes->ListPrice->FormattedPrice;
         } elseif(isset($Item->OfferSummary->LowestNewPrice->FormattedPrice)) {
           $price = $Item->OfferSummary->LowestNewPrice->FormattedPrice;
         } else {
           $price = "Price Not Available";
         }

         echo isset($Item->ItemAttributes->Title) ? $product . $niche . $url . $image . $price . '<br>' . $rating . '<br><br>' : '';

      }
    }
  }
}

/*
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
*/
