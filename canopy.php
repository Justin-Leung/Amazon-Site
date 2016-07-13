<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_implicit_flush(true);
error_reporting(0);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');

$directory = file_get_html('https://canopy.co/products/directory');
mysqli_query($db, 'TRUNCATE TABLE products');
$product_count = array();
$taken = false;

for ($product_number = 0; $product_number < 100; $product_number++) {

  /*

  Here we gather the following:
  -----------------
  product_name
  product_price
  product_image
  product_asin
  product_rating
  product_link <-- This Is Attached To Your Affiliate Link
  -----------------

  */

  $link = getProductLink($directory->find('.Directory-item', $product_number)->outertext); // Link To Product Page
  $product = file_get_html($link); // Grabs Product Page From Link
  $product_name = $directory->find('.Directory-productName', $product_number)->plaintext; // Product Name
  $product_price = $directory->find('.Directory-productPrice', $product_number)->plaintext; // Product Price
  $product_link_raw = getProductLink($product->find('.go-to-amazon', 0)->outertext); // Get Product URL
  $product_asin = makeAffiliate($product_link_raw); // Retrieves Product asin
  $product_image = getBackgroundImage($product->find('.product-image', 0)->style); // Product Image URL

  $sxml = simplexml_load_file("http://$_SERVER[HTTP_HOST]" . '/access.php?q=' . $product_asin); // Change HTTP to HTTPS or www or non-www
  if(!isset($sxml->Items->Request->Errors->Error->Message) && isset($sxml->Items->Item)) { // Checks If Product Search Was Successful
    $confirmation = "USE";
    foreach ($sxml->Items->Item as $Item) { // Loops To Find Proper XML Values
       $product_link = isset($Item->DetailPageURL) ? $Item->DetailPageURL : ''; // Your Associate URL
       $product_niche = isset($Item->ItemAttributes->Binding) ? $Item->ItemAttributes->Binding : 'Other';
       $product_rating_url = isset($Item->ItemLinks->ItemLink[5]->URL) ? $Item->ItemLinks->ItemLink[5]->URL : 'No Rating';

       if($product_rating_url !== 'No Rating') {
         $review_page = file_get_html($product_rating_url);
         $product_rating = $review_page->find('.arp-rating-out-of-text', 0)->plaintext;
         $product_rating = round_to_half((float)substr($product_rating, 0, 3));
       } else {
        $product_rating = '4.5';
       }

       if(isset($Item->ItemAttributes->ListPrice->FormattedPrice) && $Item->ItemAttributes->ListPrice->FormattedPrice !== '$0.00' && $Item->ItemAttributes->ListPrice->FormattedPrice !== 'Too low to display') {
         $product_price = $Item->ItemAttributes->ListPrice->FormattedPrice;
       } elseif(isset($Item->OfferSummary->LowestNewPrice->FormattedPrice) && $Item->OfferSummary->LowestNewPrice->FormattedPrice !== '$0.00' && $Item->OfferSummary->LowestNewPrice->FormattedPrice !== 'Too low to display') {
         $product_price = $Item->OfferSummary->LowestNewPrice->FormattedPrice;
       }
    }

  } else {
    $product_link = NULL;
    $product_niche = NULL;
    $confirmation = "IGNORE";
  }

  echo ($product_number + 1) . '<br>';

  if($product_link !== NULL && $product_niche !== NULL && $confirmation == 'USE') {

    $sub = substr($product_name, 0, 2);
    if (preg_match('/,/',$sub)) {
      $product_name = trim(substr($product_name, 2));
    }

    $product_niche = trim($product_niche);
    $product_price = trim($product_price);
    $product_image = trim($product_image);
    $product_asin = trim($product_asin);
    $product_link = trim($product_link);

    if($insert = $db->query("INSERT INTO `amazon`.`products` (`id`, `product_name`, `niche`, `link`, `image_link`, `price`, `rating`, `asin`) VALUES (NULL, '{$product_name}', '{$product_niche}', '{$product_link}', '{$product_image}', '{$product_price}', '{$product_rating}', '{$product_asin}')")) {
      echo 'Inserted <br>';
      echo $product_name . '<br>';
      echo $product_niche . '<br>';
      echo $product_price . '<br>';
      echo $product_image . '<br>';
      echo $product_asin . '<br>';
      echo $product_rating . '<br>';
      echo $product_link . '<br><br>';
    }
  } else {
    echo 'Not Inserted <br><br>';
  }
  $taken = false;

}

?>
