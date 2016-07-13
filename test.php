<?php

/* Error Display */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ob_implicit_flush(true);
error_reporting(0);

include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php');
include($_SERVER['DOCUMENT_ROOT'] . '/core/extract.php');

/****************************************************

Execution steps for collecting best seller products:
---------------------------------------------------

-- Amazon Directory Page Data --
1.) Loads one of amazons best seller pages.
2.) Retrieves a product page url which contains a product ASIN which we extract.
3.) Grabs the chunk of code that contains the image, and extracts the image source.
4.) Initial scrape of price. We will check for sale price/actual price in the API call.

-- API Call Data --
5.) Makes call with the ASIN provided
6.) Wrapper checks to see if product is still available. - TODO: For some reason clothing doesn't work in the API calls?
7.) Here we search through multiple 'Item' nodes until we find which one contains the data we need.
8.)

---------------------------------------------------

*****************************************************/

/* Step #1 */
$amazon_page = file_get_html('https://www.amazon.com/Best-Sellers-Toys-Games/zgbs/toys-and-games/');

/* Step #2 */
$product_url = $amazon_page->find('.zg_title', 0)->innertext;
$product_asin = getASIN($product_url);

/* Step #3 */
$product_image_chunk = $amazon_page->find('.zg_itemImageImmersion', 0)->innertext;
$product_image = getImageLink($product_image_chunk);

/* Step #4 */
$product_price = $amazon_page->find('.zg_price', 0)->plaintext;

/* Step #5 */
$sxml = simplexml_load_file("http://$_SERVER[HTTP_HOST]" . '/access.php?q=' . $product_asin); // Change HTTP to HTTPS or www or non-www

/* Step #6 */
if(!isset($sxml->Items->Request->Errors->Error->Message) && isset($sxml->Items->Item) {

  /* Step #7 */
  foreach ($sxml->Items->Item as $Item)
  {

    

  }

}

else {
  $product_link = NULL;
  $product_niche = NULL;
  $confirmation = "IGNORE";
}
