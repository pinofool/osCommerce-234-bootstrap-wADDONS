<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/testimonials.php');

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link('testimonials.php'));

  require(DIR_WS_INCLUDES . 'template_top.php');
?>

<div class="page-header">
  <h1><?php echo HEADING_TITLE; ?></h1>
</div>

<div class="contentContainer">

<?php
  $reviews_query_raw = "select r.reviews_id, rd.reviews_text, r.date_added, r.customers_name from reviews r, reviews_description rd WHERE r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' and reviews_status = 1 and is_testimonial = 1 order by r.reviews_id DESC";
  $reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);

  if ($reviews_split->number_of_rows > 0) {
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
?>
<div class="row">
  <div class="col-sm-6 pagenumber hidden-xs">
    <?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_TESTIMONIALS); ?>
  </div>
  <div class="col-sm-6">
    <span class="pull-right pagenav"><ul class="pagination"><?php echo $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))); ?></ul></span>
    <span class="pull-right"><?php echo TEXT_RESULT_PAGE; ?></span>
  </div>
</div>
<?php
    }
    ?>
    <div class="contentText">
      <div class="reviews">
<?php
    $reviews_query = tep_db_query($reviews_split->sql_query);
    while ($reviews = tep_db_fetch_array($reviews_query)) {
      echo '<blockquote class="col-sm-6">';
      echo '  <p>' . tep_output_string_protected($reviews['reviews_text']) . '</p><div class="clearfix"></div>';
      echo '  <footer>' . tep_output_string_protected($reviews['customers_name']) . '</footer>';
      echo '</blockquote>';
    }
    ?>
      </div>
      <div class="clearfix"></div>
    </div>
<?php
  } else {
?>

  <div class="contentText">
    <div class="alert alert-info">
      <?php echo TEXT_NO_TESTIMONIALS; ?>
    </div>
  </div>

<?php
  }

  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
<div class="row">
  <div class="col-sm-6 pagenumber hidden-xs">
    <?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_TESTIMONIALS); ?>
  </div>
  <div class="col-sm-6">
    <span class="pull-right pagenav"><ul class="pagination"><?php echo $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))); ?></ul></span>
    <span class="pull-right"><?php echo TEXT_RESULT_PAGE; ?></span>
  </div>
</div>
<?php
  }
?>

</div>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
