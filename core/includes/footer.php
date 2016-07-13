<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/filtering.js"></script>
<script src="/assets/extra/jquery.hideseek.min.js"></script>
<script src="/assets/js/engine.js"></script>

<?php

$name_chunk = '';
$price_chunk = '';
$image_chunk = '';
$rating_chunk = '';

if($result = $db->query('SELECT * FROM products')) {
  if($count = $result->num_rows) {
    while ($row = $result->fetch_assoc()) {

      $product_name = ucwords(trim($row['product_name']));
      $product_name = str_replace(",", "", $product_name);
      $product_name = str_replace(":", "", $product_name);
      $product_price = substr($row['price'], 1);
      $product_price = (int)$product_price;

      $product_price = round($product_price);

      if($product_price == 0) {
        $product_price = 'N/A';
      }

      $product_image = $row['image_link'];
      $product_niche = $row['niche'];
      $product_asin = $row['asin'];
      $product_link = $row['link'];
      $product_rating = getRating($row['rating']);

      $name_chunk = $name_chunk . '"' . $product_name . '", ';
      $price_chunk = $price_chunk . '"' . $product_price . '", ';
      $image_chunk = $image_chunk . '"' . $product_image . '", ';
      $rating_chunk = $rating_chunk . '"' . $product_rating . '", ';
    }

    // Product Name Split
    $product_chunk_name = '[' . $name_chunk . ']';
    $name_result = trim(preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_name),1));
    $product_name_array = strrev($name_result);

    // Product Price Split
    $product_chunk_price = '[' . $price_chunk . ']';
    $price_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_price),1);
    $product_price_array = strrev($price_result);

    // Product Image Split
    $product_chunk_image = '[' . $image_chunk . ']';
    $image_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_image),1);
    $product_image_array = strrev($image_result);

    // Product Image Split
    $product_chunk_rating = '[' . $rating_chunk . ']';
    $rating_result = preg_replace(strrev("/,/"),strrev(''),strrev($product_chunk_rating),1);
    $product_rating_array = strrev($rating_result);

  }
}

?>

<script type="text/javascript">

  var temp = "<li><div class='cell' style='width:{width}px; height: {height}px; background-color: #fff;'><span class='product_name'>{name}</span><div class='top-right'><a href='' class='price-tag'>{price}</a></div><div class='top-left'><a href='' class='reviews'>{rating}</a></div><img class='product-image' src='{image}'></div></li>";
  var w = 200, h = 200, html = '', limitItem = <?php echo $count; ?>;

  var product_name = <?php echo $product_name_array . ';'; ?>
  var product_price = <?php echo $product_price_array . ';'; ?>
  var product_image = <?php echo $product_image_array . ';'; ?>
  var product_rating = <?php echo $product_rating_array . ';'; ?>

  for (var i = 0; i < limitItem; ++i) {
    html += temp.replace(/\{height\}/g, h).replace(/\{width\}/g, w).replace("{name}", product_name[i]).replace("{price}", '$' + product_price[i]).replace("{image}", product_image[i]).replace("{rating}", product_rating[i]);
  }
  $("#product-wall").html(html);

  var wall = new Freewall("#product-wall");
  wall.reset({
    selector: '.cell',
    animate: true,
    cellW: 288,
    cellH: 288,
    onResize: function() {
      wall.refresh();
    }
  });

  wall.fitWidth();
  // for scroll bar appear;
  $(window).trigger("resize");

</script>
