<title><?php echo getTagline($tagline) . " | " . getWebsiteName($site_name) ?></title>
<meta charset="utf-8">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
<!-- General -->
<meta name="description" content="<?php echo getDescription($description) ?>">
<!-- Styling -->
<link rel="stylesheet" href="/assets/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="/assets/css/style.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="/assets/css/ss-pika.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="/assets/js/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 2, 180 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>

  <style type="text/css">
    .product-wall {
      margin: 100px !important;
    }
  </style>
  <script type="text/javascript" src="assets/extra/freewall.js"></script>

<?php

if($google_analytics !== '') {
  echo $google_analytics;
}

if($color !== '') {

  echo '
  <style>

  .logo .ss-icon {
    color: ' . $color .';
  }

  .product-selection #active {
    color: #fff;
    background-color: ' . $color . ';
    border-color: ' . $color . ';
  }

  .search .ss-icon {
    color: ' . $color . ';
  }

  .top-image {
  	padding-top: 10px;
  	background:
  	 linear-gradient(
  		 ' . hex2rgba($color, 0.7) . ',
  		 ' . hex2rgba($color, 0.7) . '
  	 ),
  	 url("/assets/img/top-bar-bw.jpg") repeat-x;
  }

  input[name=main-search] {
    color: ' . $color . ' !important;
    font-size: 17px !important;
    font-weight: 500px;
    letter-spacing: 0.3px;
  }

  .main-search:focus {
    border-color: ' . $color . ';
  }

  .product-selection a:hover {
    color: ' . $color . ';
    border-color: ' . $color . ';
  }

  .sale-tag {
    background-color: ' . $color . ';
}

  </style>
  ';
}

?>
