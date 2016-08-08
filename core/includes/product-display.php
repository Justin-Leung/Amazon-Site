 <div class="six columns" style="display: none;">
   <article id="attribute">
     <h4>The attribute "data-toggle"</h4>
   <pre data-language="javascript">
   <input data-toggle="hideseek">
   </pre>
   </article>
 </div>

 <div class="row">
 	  <div class="col-sm-12" id="products">

      <div class="six columns">
          <article>

      <ul class="list vertical default_list_data">

        <?php

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
              $product_price = $product_price;

              // Make sure the price isn't corrupted
              if($product_price == 0) {
                $product_price = 'N/A';
              }

              // Check to see if product has a discounted price, if so make additional changes
              if(trim($row['discount']) != '') {
                $product_price = $row['discount'] . " <strike>$" . $product_price . "</strike>";

                $product_price_slider = str_replace(".", "", $row['discount']);
                $product_price_slider = str_replace("$", "", $product_price_slider);

                $product_sale = "<div class='top-right'><span class='sale-tag-end'></span> <span class='sale-tag'>Sale!</span></div>";
                $product_price = str_replace(array("\r", "\n"), '', $product_price);
              } else {
                $product_sale = '';
                $product_price_slider = str_replace(".", "", $product_price);
                $product_price_slider = str_replace("$", "", $product_price_slider);
                $product_price = '$' . $product_price;
              }

              $product_price_non = substr($product_price, 0, 3);
              $product_price_non = str_replace(".", "", $product_price_non);
              $product_price_non = str_replace("$", "", $product_price_non);

              $product_niche = $row['niche'];
              $product_image = $row['image_link'];
              $product_asin = $row['asin'];
              $product_link = makeAff($row['link'], $AssociateTag);

              if($row['free_shipping'] == 'true') {
                $product_shipping = 'shipping';
              }

              if($row['special_offers'] == 'true') {
                $product_offers = 'offers';
              }

              if($row['no_auctions'] == 'true') {
                $product_auctions = 'auctions';
              }

              $product_rating = getRating($row['rating']);

              echo '

              <li class="' . $product_niche . ' prd ' . $product_shipping . ' ' . $product_offers . '" id="' . $product_price_slider . '">
                <p class="born" style="display: none;" id="price">' . $product_price_non . '</p>
                 <div class="col-md-4">
                     <a href="' . $product_link . '" target="_BLANK" class="thumbnail" id="product-link">
                         <div class="frontpage_square">
                         ';
                         if($product_sale !== '') {
                           echo '
                           <div class="top-right">
                             <span class="sale-tag">Sale!</span>
                           </div>
                           ';
                         }

               echo '
                  <div>
                      <img src=" ' . $product_image . ' " class="img img-responsive full-width" id="p-image"/>
                  </div>

                ';

                            if($product_sale !== '') {
                              echo '
                              <div class="top-right-price-sale">
                                <span class="price-tag">' . $product_price . '
                                </span>
                              </div>
                              ';
                            } else {
                              echo '
                              <div class="top-right-price">
                                <span class="price-tag">' . $product_price . '
                                </span>
                              </div>
                              ';
                            }

                          echo '
                            <div class="top-left">
                                 ' . $product_rating . '
                            </div>

                            <div class="bottom-center">
                                <span href="#">Buy Now</span>
                            </div>

                            <div class="product_name">
                              <p class="product-text"> ' . $product_name . '<span class="click-to-buy"><br>BUY NOW <span class="ss-icon">link</span></span>
                              </p>
                            </div>

                         </div>
                     </a>
                </div>
              </li>

              ';
            }
          }
        }

        ?>

        <button class="sort" style="display: none !important; visibility: hidden !important; opacity: 0 !important; width: 0px !important; height: 0px !important;" data-sort="born">
          Sort
        </button>

      </ul>

      </article>
    </div>

    </div>
  </div>

    <script type="text/javascript">
    var options = {
    valueNames: [ 'born' ]
    };

    var userList = new List('products', options);
    </script>
