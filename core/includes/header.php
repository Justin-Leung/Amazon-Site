<div class="col-md-6">
  <div class="col-md-2 logo">
    <span class="ss-icon">
      <?php
      if($site_icon !== '') echo $site_icon;
      else echo 'tag';
      ?>
    </span>
  </div>
  <div class="col-md-10 headline">
    <h2><?php echo getWebsiteName($site_name) ?></h2>
    <p><?php echo getTagline($tagline) ?></p>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group search">
    <input type="text" class="form-control main-search search" name="main-search" placeholder="Search Products" id="main-search" data-toggle="hideseek" data-list=".default_list_data" data-nodata="No Products Found!" autocomplete="off">
    <span class="ss-icon">search</span>
  </div>
</div>
