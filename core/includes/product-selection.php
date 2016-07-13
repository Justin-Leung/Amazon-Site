
<div class="row product-selection">
  <div class="col-sm-12">
    <a class="niche all" id="active">All</a>
    <a class="niche">Books</a>
    <a class="niche">Movies</a>
    <a class="niche">Electronics</a>
    <a class="niche">Home</a>
    <a class="niche">Beauty</a>
    <a class="niche">Toys</a>
    <a class="niche">Clothing</a>
    <a class="niche">Outdoors</a>
    <span class="fa fa-gear options tilt"></span>
  </div>

  <br><br><br>

  <div class="product-options">
    <div class="row">
      <div class="col-sm-3 col-sm-offset-2 option-type price-range">
        <p>
          <label for="amount" style="color: #8c7f72; font-size: 18px;">Price range:</label>
          <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; padding-bottom: 13px; text-align: center;">
          <br>
        </p>

        <div id="slider-range"></div>
      </div>

      <div class="col-sm-3 option-type-checkbox">
        <form action="">
          <div class="checkbox-option">
            <input type="checkbox" name="check-opt" id="Shipping" value=""><span class="checkbox-text">Free Shipping</span><br>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" name="check-opt" id="Special" value=""><span class="checkbox-text">Special Offers Only</span><br>
          </div>
          <div class="checkbox-option">
            <input type="checkbox" name="check-opt" id="Auctions" value=""><span class="checkbox-text">No Auctions</span>
          </div>
          </form>
      </div>

      <div class="col-sm-3 option-type-select">
        <p>
          Sorting
        </p>
        <hr>
        <select id="sorting">
          <option value="Relevance">Relevance</option>
          <option value="Ascending">Price Ascending</option>
          <option value="Descending">Price Descending</option>
        </select>
        <hr>
      </div>

    </div>
  </div>
</div>
