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
        $('.books').fadeTo('fast', 1);
        $('.movies').fadeTo('fast', 1);
        $('.electronics').fadeTo('fast', 1);
        $('.home').fadeTo('fast', 1);
        $('.beauty').fadeTo('fast', 1);
        $('.toys').fadeTo('fast', 1);
        $('.clothing').fadeTo('fast', 1);
        $('.outdoors').fadeTo('fast', 1);
        $('.other').fadeTo('fast', 1);
      }

      else if($(this).text() == 'Books') {
        $('.books').fadeTo('fast', 1);
        $('.movies').fadeTo('fast', 0.2);
        $('.electronics').fadeTo('fast', 0.2);
        $('.home').fadeTo('fast', 0.2);
        $('.beauty').fadeTo('fast', 0.2);
        $('.toys').fadeTo('fast', 0.2);
        $('.clothing').fadeTo('fast', 0.2);
        $('.outdoors').fadeTo('fast', 0.2);
        $('.other').fadeTo('fast', 0.2);
      }

      else if($(this).text() == 'Movies') {
        $('.books').fadeTo('fast', 0.2);
        $('.movies').fadeTo('fast', 1);
        $('.electronics').fadeTo('fast', 0.2);
        $('.home').fadeTo('fast', 0.2);
        $('.beauty').fadeTo('fast', 0.2);
        $('.toys').fadeTo('fast', 0.2);
        $('.clothing').fadeTo('fast', 0.2);
        $('.outdoors').fadeTo('fast', 0.2);
        $('.other').fadeTo('fast', 0.2);
      }

      else if($(this).text() == 'Electronics') {
        $('.books').fadeTo('fast', 0.2);
        $('.movies').fadeTo('fast', 0.2);
        $('.electronics').fadeTo('fast', 1);
        $('.home').fadeTo('fast', 0.2);
        $('.beauty').fadeTo('fast', 0.2);
        $('.toys').fadeTo('fast', 0.2);
        $('.clothing').fadeTo('fast', 0.2);
        $('.outdoors').fadeTo('fast', 0.2);
        $('.other').fadeTo('fast', 0.2);
      }

      else if($(this).text() == 'Home') {
        $('.books').fadeTo('fast', 0.2);
        $('.movies').fadeTo('fast', 0.2);
        $('.electronics').fadeTo('fast', 0.2);
        $('.home').fadeTo('fast', 1);
        $('.beauty').fadeTo('fast', 0.2);
        $('.toys').fadeTo('fast', 0.2);
        $('.clothing').fadeTo('fast', 0.2);
        $('.outdoors').fadeTo('fast', 0.2);
        $('.other').fadeTo('fast', 0.2);
      }

      else if($(this).text() == 'Beauty') {
        $('.books').fadeTo('fast', 0.2);
        $('.movies').fadeTo('fast', 0.2);
        $('.electronics').fadeTo('fast', 0.2);
        $('.home').fadeTo('fast', 0.2);
        $('.beauty').fadeTo('fast', 1);
        $('.toys').fadeTo('fast', 0.2);
        $('.clothing').fadeTo('fast', 0.2);
        $('.outdoors').fadeTo('fast', 0.2);
        $('.other').fadeTo('fast', 0.2);
      }

      else if($(this).text() == 'Toys') {
        $('.books').fadeTo('fast', 0.2);
        $('.movies').fadeTo('fast', 0.2);
        $('.electronics').fadeTo('fast', 0.2);
        $('.home').fadeTo('fast', 0.2);
        $('.beauty').fadeTo('fast', 0.2);
        $('.toys').fadeTo('fast', 1);
        $('.clothing').fadeTo('fast', 0.2);
        $('.outdoors').fadeTo('fast', 0.2);
        $('.other').fadeTo('fast', 0.2);
      }

      else if($(this).text() == 'Clothing') {
        $('.books').fadeTo('fast', 0.2);
        $('.movies').fadeTo('fast', 0.2);
        $('.electronics').fadeTo('fast', 0.2);
        $('.home').fadeTo('fast', 0.2);
        $('.beauty').fadeTo('fast', 0.2);
        $('.toys').fadeTo('fast', 0.2);
        $('.clothing').fadeTo('fast', 1);
        $('.outdoors').fadeTo('fast', 0.2);
      }

      else if($(this).text() == 'Outdoors') {
        $('.books').fadeTo('fast', 0.2);
        $('.movies').fadeTo('fast', 0.2);
        $('.electronics').fadeTo('fast', 0.2);
        $('.home').fadeTo('fast', 0.2);
        $('.beauty').fadeTo('fast', 0.2);
        $('.toys').fadeTo('fast', 0.2);
        $('.clothing').fadeTo('fast', 0.2);
        $('.outdoors').fadeTo('fast', 1);
        $('.other').fadeTo('fast', 0.2);
      }

    e.preventDefault();

  });

});
