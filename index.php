<?php include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/core/includes/head.php'); ?>
  </head>
  <body>

    <div class="top-image"></div>

    <!-- Header Section -->
    <section class="header">
      <div class="container">
        <div class="row header-elements">
          <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php'); ?>
        </div>
        <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/core/includes/product-selection.php'); ?>
      </div>
    </section>
    <!-------------------->

    <!-- Product Display Area -->
    <section class="products">
      <div class="container-fluid maxWidth">
        <div class="row">
          <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/core/includes/product-display.php'); ?>
        </div>
      </div>
    </section>
    <!-------------------------->

    <!-- Footer -->
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/core/includes/footer.php'); ?>
    <!----------->

  </body>
</html>
