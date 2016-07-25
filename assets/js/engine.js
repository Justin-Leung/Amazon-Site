$(document).ready(function() {

  var wall = new Freewall("#product-wall");

  var options = false;

  $('.options').click(function(e) {
    if(options === false) {
      $('.product-options').slideDown();
      $('.option-type-select').fadeIn();
      $('.price-range').fadeIn();
      $('.option-type-checkbox').fadeIn();
      options = true;
    } else {
      $('.product-options').slideUp(500).delay(1000);
      $('.option-type-select').fadeOut(500);
      $('.price-range').fadeOut(500);
      $('.option-type-checkbox').fadeOut(500);
      options = false;

      wall.filter("#1-2");
      wall.reset({
        selector: '.cell',
        onResize: function() {
          wall.refresh();
        }
      });

    }
  });

  $('.cell').click(function(e) {
    window.open($(this).attr('href'),'_blank');
  });

});
