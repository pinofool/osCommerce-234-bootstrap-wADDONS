<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_GV_FAQ);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_GV_FAQ));

  require('includes/template_top.php');
?>

<h1><?php echo HEADING_TITLE; ?></h1>

<div class="contentContainer">
  <div class="contentText">
    <?php echo TEXT_INFORMATION; ?>
  </div>
  
    <div class="contentText">
     <strong><?php echo SUB_HEADING_TITLE; ?></strong>
     <p class="main"><?php echo SUB_HEADING_TEXT; ?></p>
    </div> 



  <div class="buttonSet">
    <span class="buttonAction"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'triangle-1-e', tep_href_link('index.php')); ?></span>
  </div>
</div>

<?php
  require('includes/template_bottom.php');
  require('includes/application_bottom.php');
?>
