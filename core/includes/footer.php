<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/filtering.js"></script>
<script src="/assets/extra/jquery.hideseek.min.js"></script>
<script src="/assets/js/engine.js"></script>

<?php

$name_chunk = '';
$price_chunk = '';
$niche_chunk = '';
$sale_chunk = '';
$image_chunk = '';
$rating_chunk = '';
$link_chunk = '';
$set_products = 0;

if($result = $db->query('SELECT * FROM products')) {
  if($count = $result->num_rows) {
    while ($row = $result->fetch_assoc()) {

      // Gets Product Name
      $product_name = ucwords(trim($row['product_name']));
      $product_name = str_replace("\"", "", $product_name);
      $product_name = substr($product_name, 0, 70);

      // Checks if string is longer then 68 characters, if so add asterisk
      if(strlen($product_name) > 68) {
        $product_name = $product_name . '..';
      }

      // Retrieve the products price and clean the data
      $product_price = substr($row['price'], 1);
      $product_price = (float)$product_price;
      $product_price = round($product_price);

      // Make sure the price isn't corrupted
      if($product_price == 0) {
        $product_price = 'N/A';
      }

      // Check to see if product has a discounted price, if so make additional changes
      if(trim($row['discount']) != '') {
        $product_price = $row['discount'] . " <strike>$" . $product_price . "</strike>";
        $product_sale = "<div class='top-right'><span class='sale-tag-end'></span> <span class='sale-tag'>Sale!</span></div>";
        $product_price = str_replace(array("\r", "\n"), '', $product_price);
      } else {
        $product_sale = '';
        $product_price = '$' . $product_price;
      }

      $product_niche = $row['niche'];

      if($product_niche == 'Health and Beauty') {
        $product_niche = 'beauty';
      } elseif ($product_niche == 'Electronics') {
        $product_niche = 'electronics';
      } elseif ($product_niche == 'Wireless Phone Accessory') {
        $product_niche = 'electronics';
      } elseif ($product_niche == 'Video Game') {
        $product_niche = 'toys';
      } elseif ($product_niche == 'Personal Computers') {
        $product_niche = 'electronics';
      } elseif ($product_niche == 'Baby Product') {
        $product_niche = 'home';
      } elseif ($product_niche == 'Toy') {
        $product_niche = 'toys';
      } else {
        $product_niche = 'other';
      }

      $product_image = $row['image_link'];
      $product_asin = $row['asin'];
      $product_link = $row['link'];
      $product_rating = getRating($row['rating']);

      $name_chunk = $name_chunk . '"' . $product_name . '", ';
      $price_chunk = $price_chunk . '"' . $product_price . '", ';
      $niche_chunk = $niche_chunk . '"' . $product_niche . '", ';
      $sale_chunk = $sale_chunk . '"' . $product_sale . '", ';
      $image_chunk = $image_chunk . '"' . $product_image . '", ';
      $rating_chunk = $rating_chunk . '"' . $product_rating . '", ';
      $link_chunk = $link_chunk . '"' . $product_link . '", ';
    }

    // Product Name Split
    $product_chunk_name = '[' . $name_chunk . ']';
    $name_result = trim(preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_name),1));
    $product_name_array = strrev($name_result);

    // Product Price Split
    $product_chunk_price = '[' . $price_chunk . ']';
    $price_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_price),1);
    $product_price_array = strrev($price_result);

    // Product Price Split
    $product_chunk_niche = '[' . $niche_chunk . ']';
    $niche_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_niche),1);
    $product_niche_array = strrev($niche_result);

    // Sale Option
    $product_chunk_sale = '[' . $sale_chunk . ']';
    $sale_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_sale),1);
    $product_sale_array = strrev($sale_result);

    // Product Image Split
    $product_chunk_image = '[' . $image_chunk . ']';
    $image_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_image),1);
    $product_image_array = strrev($image_result);

    // Product Rating Split
    $product_chunk_rating = '[' . $rating_chunk . ']';
    $rating_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_rating),1);
    $product_rating_array = strrev($rating_result);

    // Product Link Split
    $product_chunk_link = '[' . $link_chunk . ']';
    $link_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_link),1);
    $product_link_array = strrev($link_result);
  }
}

?>


<script type="text/javascript">

  function shuffle(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
  }

  var temp = "<div class='cell {niche}' href='{link}' style='width:368px; height: 368px; background-color: #fff;'><a class='product_name'><p class='product-text'>{name}<span class='click-to-buy'><br>BUY NOW <span class='ss-icon'>link</span></span></p></a>{sale}<div class='bottom-right'><a class='price-tag'>{price}</a></div><div class='bottom-left'><a class='reviews'>{rating}</a></div><div class='p-image'><img class='product-image' src='{image}'></div></div>";
  // var temp = "<li><div class='cell' style='width:{width}px; height: {height}px; background-color: #fff;'><span {spacing} class='product_name'>{name}</span><div class='top-right'><a href='' class='price-tag'>{price}</a></div><div class='top-left'><a class='reviews'>{rating}</a></div><img class='product-image' src='{image}'><div class='buy-now'><a href='{link}'><span class='ss-icon'>basket</span> Buy On Amazon</a></div></div></li>";
  var w = 368, h = 368, html = '', limitItem = <?php echo $count; ?>;

  var product_name = <?php echo $product_name_array . ';'; ?>
  var product_price = <?php echo $product_price_array . ';'; ?>
  var product_niche = <?php echo $product_niche_array . ';'; ?>
  var product_sale = <?php echo $product_sale_array . ';'; ?>
  var product_image = <?php echo $product_image_array . ';'; ?>
  var product_rating = <?php echo $product_rating_array . ';'; ?>
  var product_link = <?php echo $product_link_array . ';'; ?>
  var random_nums = [];

  for(var j = 0; j < product_rating.length; j++) {
    random_nums.push(j);
  }

  // shuffle(random_nums);

  for (var i = 6; i < limitItem; ++i) {
    num = random_nums[i];
    html += temp.replace("{name}", product_name[num]).replace("{price}", product_price[num]).replace("{sale}", product_sale[num]).replace("{image}", product_image[num]).replace("{rating}", product_rating[num]).replace("{link}", product_link[num]).replace("{niche}", product_niche[num]);
  }

  $("#product-wall").html(html);

  $("#product-wall").html(html);
  var wall = new Freewall("#product-wall");
  wall.reset({
    selector: '.cell',
    animate: true,
    appendHoles: 10,
    cellW: 368,
    cellH: 368,
    onResize: function() {
      wall.refresh();
    }
  });
  wall.fitWidth();
  // for scroll bar appear;
  $(window).trigger("resize");

</script>
