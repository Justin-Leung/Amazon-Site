<?php include($_SERVER['DOCUMENT_ROOT'] . '/core/init.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Privacy Policy<?php echo " | " . getWebsiteName($site_name) ?></title>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <!-- General -->
    <meta name="description" content="<?php echo getDescription($description) ?>">
    <!-- Styling -->
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
