<?php

// Recieve URL Website Name
function getWebsiteName($site_name) {
  if(empty($site_name)) {
    return $_SERVER['HTTP_HOST'];
  } else {
    return $site_name;
  }
}

function getTagline($tagline) {
  if(empty($tagline)) {
    return 'The Best Products, All The Time.';
  } else {
    return $tagline;
  }
}

function getDescription($description) {
  if(empty($description)) {
    return 'Find the best products out there that don\'t break the bank. Search a vast selection of products that are hot on the market as we speak!';
  } else {
    return $description;
  }
}

function getBestSellers() {
  $best_sellers = file_get_html('https://www.amazon.com/Best-Sellers-Electronics/zgbs/electronics/');
  $best_seller_links = array();

  $best_seller_links[0] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(0)->innertext);
  $best_seller_links[1] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(1)->innertext);
  $best_seller_links[2] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(2)->innertext);
  $best_seller_links[3] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(3)->innertext);
  $best_seller_links[4] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(4)->innertext);
  $best_seller_links[5] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(5)->innertext);
  $best_seller_links[6] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(6)->innertext);
  $best_seller_links[7] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(7)->innertext);
  $best_seller_links[8] = getProductLink($best_sellers->find("#zg_browseRoot", 0)->children(1)->children(1)->children(8)->innertext);
  $best_seller_links[9] = 'https://www.amazon.com/gp/most-gifted/toys-and-games/';
  $best_seller_links[10] = 'https://www.amazon.com/best-sellers-books-Amazon/zgbs/books/';

  return $best_seller_links;
}

function getProductLink($product_element) {
  preg_match('/href=(["\'])([^\1]*)\1/i', $product_element, $m);
  $m[2] = current(explode("?", $m[2]));
  return $m[2];
}

function getImageLink($image_element) {
  $array = array();
  preg_match( '/src="([^"]*)"/i', $image_element, $array);
  $array[1] = str_replace("SL160", "SL600", $array[1]);
  $array[1] = str_replace("SL150", "SL600", $array[1]);
  return $array[1];
}

function makeAffiliate($product_link) {
  $link = htmlspecialchars($product_link);
  $pid = substr(strstr($link,"p/"),2,10);
  return $pid;
}

function getBackgroundImage($snippet) {
  $pattern = '/background-image:\s*url\(\s*([\'"]*)(?P<file>[^\1]+)\1\s*\)/i';
  $matches = array();
  if (preg_match($pattern, $snippet, $matches)) {
      return $matches['file'];
  }
}

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default;

	//Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}

function round_to_half($num) {
  if($num >= ($half = ($ceil = ceil($num))- 0.5) + 0.25) return $ceil;
  else if($num < $half - 0.25) return floor($num);
  else return $half;
}

function getRating($product_rating) {
  if($product_rating == '5') return "<span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span>";
  elseif($product_rating == '4.5') return "<span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star-half-o'></span> </span><span class='fa fa-star-o'></span>";
  elseif($product_rating == '4') return "<span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span><span class='fa fa-star-o'></span>";
  elseif($product_rating == '3.5') return "<span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star-half-o'></span><span class='fa fa-star-o'></span>";
  elseif($product_rating == '3') return "<span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";
  elseif($product_rating == '2.5') return "<span class='fa fa-star'></span> <span class='fa fa-star'></span> <span class='fa fa-star-half-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";
  elseif($product_rating == '2') return "<span class='fa fa-star'></span> <span class='fa fa-star'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";
  elseif($product_rating == '1.5') return "<span class='fa fa-star'></span> <span class='fa fa-star-half-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";
  elseif($product_rating == '1') return "<span class='fa fa-star'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span><span class='fa fa-star-o'></span>";
}

function getASIN($product_link) {
  preg_match('/href=(["\'])([^\1]*)\1/i', $product_link, $m);
  $m[2] = current(explode("?", $m[2]));
  $link = htmlspecialchars('http://www.amazon.com' . $m[2]);
  $pid = substr(strstr($link,"p/"),2,10);
  return $pid;
}

/* Unused Functions
**********/

function fixPrice($broken_price) {
  echo $broken_price;
  $string = $broken_price;
  $string = preg_replace('/\s+/', '', $string);
  $string = str_replace('$','', $string);
  $length = strlen($string);

  $string = intval($string);
  $price = $string / 100;

  if(strlen(str_replace('.','', $price)) < $length) {
     return $price = '$' . (string)$price . '0';
  } else {
    return '$' . $price;
  }
}

function searchUrl($phrase) {
  $phrase = str_replace(' ', '+', trim($phrase));
  return $phrase;
}

?>
