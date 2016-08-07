$(document).ready(function() {

  var pricemin = $("#slider-range").slider("values")[0];
  var pricemax = $("#slider-range").slider("values")[1];
  var checked = '';
  var sorting = 'Relevance';
  var niche = 'All';

  $( "#slider-range" ).bind( "slidechange", function(event, ui) {
      pricemin = $("#slider-range").slider("values")[0] * 100;
      pricemax = $("#slider-range").slider("values")[1] * 100;

      $('.prd').map(function () {

        if (this.id > pricemin && this.id < pricemax) {
          $('#' + this.id).show();
        } else {
          $('#' + this.id).hide();
        }

      })
  });

  var shipping = 'false'; // Not Clicked Yet
  var offers = 'false'; // Not Clicked Yet
  var auctions = 'false'; // Not Clicked Yet

  $('input[type="checkbox"]').change(function() {

    if(this.id === 'Shipping') {
      if(shipping === 'false') {
        $('.shipping').show();
        shipping = 'true';
      } else {
        $('.shipping').hide();
        shipping = 'false';
      }
    }

    else if(this.id === 'Special') {
      if(offers === 'false') {
        $('.offers').show();
        offers = 'true';
      } else {
        $('.offers').hide();
        offers = 'false';
      }
    }

    else if (this.id === 'Auctions') {
      if(auctions === 'false') {
        $('.auctions').show();
        auctions = 'true';
      } else {
        $('.auctions').hide();
        auctions = 'false';
      }
    }

  });

  // Sorting Select Options
  $('#sorting').on('change', function() {
    sorting = this.value;

    console.log(sorting);

    if(sorting == 'Descending') {
      $(".sort").trigger( "click" );
    } else {
      $(".sort").trigger( "click" );
    }

  });

  // Product Selection Filtering
  $('a.niche').click(function(e) {

    $('#active').each(function() {
      $(this).removeAttr('id') // Removes Currently Selected Product Type
    });

    $(this).attr('id', 'active'); // Adds Active ID To Current Product Type

      niche = $(this).text();

      if($(this).text() == 'All') {
        $('.books').show();
        $('.movies').show();
        $('.electronics').show();
        $('.home').show();
        $('.beauty').show();
        $('.toys').show();
        $('.clothing').show();
        $('.outdoors').show();
        $('.other').show();
      }

      else if($(this).text() == 'Books') {
        $('.books').show();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
        $('.other').hide();
      }

      else if($(this).text() == 'Movies') {
        $('.books').hide();
        $('.movies').show();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
        $('.other').hide();
      }

      else if($(this).text() == 'Electronics') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').show();
        $('.home').hide();
        $('.beauty').hide();
        $('.toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
        $('.other').hide();
      }

      else if($(this).text() == 'Home') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').show();
        $('.beauty').hide();
        $('.toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
        $('.other').hide();
      }

      else if($(this).text() == 'Beauty') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').show();
        $('.toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
        $('.other').hide();
      }

      else if($(this).text() == 'Toys') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.toys').show();
        $('.clothing').hide();
        $('.outdoors').hide();
        $('.other').hide();
      }

      else if($(this).text() == 'Clothing') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.toys').hide();
        $('.clothing').show();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Outdoors') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.toys').hide();
        $('.clothing').hide();
        $('.outdoors').show();
        $('.other').hide();
      }

    e.preventDefault();

  });

});
