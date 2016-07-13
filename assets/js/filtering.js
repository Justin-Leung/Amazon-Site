$(document).ready(function() {

  var pricemin = $("#slider-range").slider("values")[0];
  var pricemax = $("#slider-range").slider("values")[1];
  var checked = '';
  var sorting = 'Relevance';
  var niche = 'All';

  $( "#slider-range" ).bind( "slidechange", function(event, ui) {
      pricemin = $("#slider-range").slider("values")[0];
      pricemax = $("#slider-range").slider("values")[1];

      console.log('min:' + pricemin);
      console.log('max:' + pricemax);
  });

  $('input[type="checkbox"]').change(function() {
    if(checked.indexOf(this.id) >= 0) {
      checked = checked.replace(this.id,'');
    } else {
      checked = checked + this.id;
    }

    console.log(checked);
  });

  // Sorting Select Options
  $('#sorting').on('change', function() {
    sorting = this.value;

    console.log(sorting);
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
        $('.Toys').show();
        $('.clothing').show();
        $('.outdoors').show();
      }

      else if($(this).text() == 'Books') {
        $('.books').show();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.Toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Movies') {
        $('.books').hide();
        $('.movies').show();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.Toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Electronics') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').show();
        $('.home').hide();
        $('.beauty').hide();
        $('.Toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Home') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').show();
        $('.beauty').hide();
        $('.Toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Beauty') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').show();
        $('.Toys').hide();
        $('.clothing').hide();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Toy') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.Toys').show();
        $('.clothing').hide();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Clothing') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.Toys').hide();
        $('.clothing').show();
        $('.outdoors').hide();
      }

      else if($(this).text() == 'Outdoors') {
        $('.books').hide();
        $('.movies').hide();
        $('.electronics').hide();
        $('.home').hide();
        $('.beauty').hide();
        $('.Toys').hide();
        $('.clothing').hide();
        $('.outdoors').show();
      }

    e.preventDefault();

  });

});
