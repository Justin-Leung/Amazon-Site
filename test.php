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
8.) Retrieves Products: Affiliate Link, Name, Rating URL and Rating, Niche/Category, and sale price.

    Link - Grabs link from API call
    Name - Grabs name from API call
    Rating - Grabs link to review page, then from there scrapes review. (Only way to retrieve Review without IP being banned)
    Niche - Grabs niche from API call
    Price - Checks to see if there is a price and a sale price. If neither is preset (Occurs sometimes) then just use the initial value scraped from Step #4

---------------------------------------------------

*****************************************************/

/* Step #1 */
$amazon_page = file_get_html('https://www.amazon.com/best-sellers-books-Amazon/zgbs/books/');

/* Step #2 */
$product_url = $amazon_page->find('.zg_title', 1)->innertext;
$product_asin = getASIN($product_url);

/* Step #3 */
$product_image_chunk = $amazon_page->find('.zg_itemImageImmersion', 1)->innertext;
$product_image = getImageLink($product_image_chunk);

/* Step #4 */
$product_price = trim($amazon_page->find('.zg_price', 1)->plaintext);

/* Step #5 */
$sxml = simplexml_load_file("http://$_SERVER[HTTP_HOST]" . '/access.php?q=' . $product_asin); // Change HTTP to HTTPS or www or non-www

/* Step #6 */
if(!isset($sxml->Items->Request->Errors->Error->Message) && isset($sxml->Items->Item)) {

  /* Step #7 */
  foreach ($sxml->Items->Item as $Item)
  {

   /**************
    * Step #8
    ***************/

    /* Link */
    $product_link = isset($Item->DetailPageURL) ? $Item->DetailPageURL : $product_url;

    /* Name */
    $product_name = isset($Item->ItemAttributes->Title) ? $Item->ItemAttributes->Title : '';

    /* Niche */
    $product_niche = isset($Item->ItemAttributes->Binding) ? $Item->ItemAttributes->Binding : 'Other';

    /* Rating */
    $product_rating_url = isset($Item->ItemLinks->ItemLink[5]->URL) ? $Item->ItemLinks->ItemLink[5]->URL : 'No Rating';
    if($product_rating_url !== 'No Rating') {
      $review_page = file_get_html($product_rating_url);
      $product_rating = $review_page->find('.arp-rating-out-of-text', 0)->plaintext;
      $product_rating = round_to_half((float)substr($product_rating, 0, 3));
      if($product_rating == 0) {
        $product_rating = '5';
      }
    } else {
      $product_rating = '4.5';
    }

    /* Item Price */
    if(isset($Item->ItemAttributes->ListPrice->FormattedPrice) && $Item->ItemAttributes->ListPrice->FormattedPrice !== '$0.00' && $Item->ItemAttributes->ListPrice->FormattedPrice !== 'Too low to display') {
      $product_price = $Item->ItemAttributes->ListPrice->FormattedPrice;
    } elseif(isset($Item->OfferSummary->LowestNewPrice->FormattedPrice) && $Item->OfferSummary->LowestNewPrice->FormattedPrice !== '$0.00' && $Item->OfferSummary->LowestNewPrice->FormattedPrice !== 'Too low to display') {
      $product_price = $product_price . 'SALE' . $Item->OfferSummary->LowestNewPrice->FormattedPrice;
    }

  }

}

echo $product_name . '<br>';
echo $product_niche . '<br>';
echo $product_price . '<br>';
echo $product_image . '<br>';
echo $product_asin . '<br>';
echo $product_rating . '<br>';
echo $product_link . '<br><br>';
