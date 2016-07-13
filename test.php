<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ob_implicit_flush(true);
error_reporting(0);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');

mysqli_query($db, 'TRUNCATE TABLE products');
$product_page_num = 0;
$p = 0;
$products = array();

/****************************************************

Execution steps for collecting best seller products:
---------------------------------------------------

-- Pre Scrape --
* Scrapes pages and finds links to best sellers. Since the links are constantly updated a fresh search must be made to find the unique links.

-- Amazon Directory Page Data --
1.) Loads one of amazons best seller pages.
2.) Retrieves a product page url which contains a product ASIN which we extract.

-- API Call Data --
3.) Makes call with the extracted ASIN
4.) Wrapper checks to see if product is available. - TODO: For some reason clothing doesn't work in the API calls?
5.) Here we search through multiple 'Item' nodes until we find which one contains the data we need.
6.) Retrieves Products: Affiliate Link, Name, Rating URL and Rating, Niche/Category, and sale price.

    Link - Grabs link from API call
    Name - Grabs name from API call
    Rating - Grabs link to review page, then from there scrapes review. (Only way to retrieve Review without IP being banned)
    Niche - Grabs niche from API call

---------------------------------------------------

*****************************************************/

/* Pre Scrape */
$best_sellers = getBestSellers();

for ($product_number=0; $product_number < 29; $product_number++) {

  if($p >= 7) {
    $product_page_num++;
    $p = 0;
  }

  /* Step #1 */
  $amazon_page = file_get_html($best_sellers[$product_page_num]);

  /* Step #2 */
  $product_url = $amazon_page->find('.zg_title', $p)->innertext;
  $product_asin = getASIN($product_url);

  /* Step #3 */
  $sxml = simplexml_load_file("http://$_SERVER[HTTP_HOST]" . '/access.php?q=' . $product_asin); // Change HTTP to HTTPS or www or non-www

  /* Step #4 */
  if(!isset($sxml->Items->Request->Errors->Error->Message) && isset($sxml->Items->Item)) {

    /* Step #5 */
    foreach ($sxml->Items->Item as $Item)
    {

     /**********************
      * Step #6 Collection
      *********************/

      /* Name */
      $product_name = isset($Item->ItemAttributes->Title) ? $Item->ItemAttributes->Title : '';

      /* Link */
      $product_link = isset($Item->DetailPageURL) ? $Item->DetailPageURL : $product_url;

      /* Niche */
      $product_niche = isset($Item->ItemAttributes->Binding) ? $Item->ItemAttributes->Binding : 'Other';

      /* Rating */
      $product_rating = $amazon_page->find('.zg_reviews', $p)->children(0)->children(0)->children(0)->children(0)->plaintext;
      $product_rating = round_to_half((float)substr($product_rating, 0, 3));

      /* Price */
      /*
      if(is_object($amazon_page->find('.zg_price', $p)->children(1))) {
        $product_list_price = $amazon_page->find('.zg_price', $p)->children(0)->plaintext;
        $product_price = $amazon_page->find('.zg_price', $p)->children(1)->plaintext . 'SALE' . $product_list_price;
      } else {
        $product_list_price = '';
        $product_price = $amazon_page->find('.zg_price', $p)->children(0)->plaintext;
      }
      */

      $product_price = $amazon_page->find('.zg_price', $p)->children(0)->plaintext;

      if(is_object($amazon_page->find('.zg_price', $p)->children(1))) {
        $product_price_discount = $amazon_page->find('.zg_price', $p)->children(1)->plaintext;
      }

      /* Image Link */
      $product_image_chunk = $amazon_page->find('.zg_itemImageImmersion', $p)->innertext;
      $product_image = getImageLink($product_image_chunk);

    }

  }

  if (!in_array($product_asin, $products)) {
    $products[$product_number] = $product_asin;

    if($insert = $db->query("INSERT INTO `amazon`.`products` (`id`, `product_name`, `niche`, `link`, `image_link`, `price`, `rating`, `asin`) VALUES (NULL, '{$product_name}', '{$product_niche}', '{$product_link}', '{$product_image}', '{$product_price}', '{$product_rating}', '{$product_asin}')")) {
      echo 'Inserted <br>';
      echo $product_name . '<br>';
      echo $product_niche . '<br>';
      echo $product_price .  '<br>';
      echo $product_image . '<br>';
      echo $product_asin . '<br>';
      echo $product_rating . '<br>';
      echo $product_link . '<br><br>';
    }

  } else {
    echo 'Product Not Saved. <br><br>';
  }
  $p++;
}

for ($product_number=30; $product_number < 66; $product_number++) {

  if($p >= 7) {
    $product_page_num++;
    $p = 0;
  }

  /* Step #1 */
  $amazon_page = file_get_html($best_sellers[$product_page_num]);

  /* Step #2 */
  $product_url = $amazon_page->find('.zg_title', $p)->innertext;
  $product_asin = getASIN($product_url);

  /* Step #3 */
  $sxml = simplexml_load_file("http://$_SERVER[HTTP_HOST]" . '/access.php?q=' . $product_asin); // Change HTTP to HTTPS or www or non-www

  /* Step #4 */
  if(!isset($sxml->Items->Request->Errors->Error->Message) && isset($sxml->Items->Item)) {

    /* Step #5 */
    foreach ($sxml->Items->Item as $Item)
    {

     /**********************
      * Step #6 Collection
      *********************/

      /* Name */
      $product_name = isset($Item->ItemAttributes->Title) ? $Item->ItemAttributes->Title : '';

      /* Link */
      $product_link = isset($Item->DetailPageURL) ? $Item->DetailPageURL : $product_url;

      /* Niche */
      $product_niche = isset($Item->ItemAttributes->Binding) ? $Item->ItemAttributes->Binding : 'Other';

      /* Rating */
      $product_rating = $amazon_page->find('.zg_reviews', $p)->children(0)->children(0)->children(0)->children(0)->plaintext;
      $product_rating = round_to_half((float)substr($product_rating, 0, 3));

      /* Price */
      /*
      if(is_object($amazon_page->find('.zg_price', $p)->children(1))) {
        $product_list_price = $amazon_page->find('.zg_price', $p)->children(0)->plaintext;
        $product_price = $amazon_page->find('.zg_price', $p)->children(1)->plaintext . 'SALE' . $product_list_price;
      } else {
        $product_list_price = '';
        $product_price = $amazon_page->find('.zg_price', $p)->children(0)->plaintext;
      }
      */

      $product_price = $amazon_page->find('.zg_price', $p)->children(0)->plaintext;

      if(is_object($amazon_page->find('.zg_price', $p)->children(1))) {
        $product_price_discount = $amazon_page->find('.zg_price', $p)->children(1)->plaintext;
      }

      /* Image Link */
      $product_image_chunk = $amazon_page->find('.zg_itemImageImmersion', $p)->innertext;
      $product_image = getImageLink($product_image_chunk);

    }

  }

  if (!in_array($product_asin, $products)) {
    $products[$product_number] = $product_asin;

    if($insert = $db->query("INSERT INTO `amazon`.`products` (`id`, `product_name`, `niche`, `link`, `image_link`, `price`, `rating`, `asin`) VALUES (NULL, '{$product_name}', '{$product_niche}', '{$product_link}', '{$product_image}', '{$product_price}', '{$product_rating}', '{$product_asin}')")) {
      echo 'Inserted <br>';
      echo $product_name . '<br>';
      echo $product_niche . '<br>';
      echo $product_price .  '<br>';
      echo $product_image . '<br>';
      echo $product_asin . '<br>';
      echo $product_rating . '<br>';
      echo $product_link . '<br><br>';
    }

  } else {
    echo 'Product Not Saved. <br><br>';
  }
  $p++;
}
?>
