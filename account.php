<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2015 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  if (!isset($_SESSION['customer_id'])) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link('login.php', '', 'SSL'));
  }

  require(DIR_WS_LANGUAGES . $_SESSION['language'] . '/account.php');

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link('account.php', '', 'SSL'));

  require('includes/template_top.php');
?>

<div class="page-header">
  <h1><?php echo HEADING_TITLE; ?></h1>
</div>

<?php
  if ($messageStack->size('account') > 0) {
    echo $messageStack->output('account');
  }
?>

<div class="contentContainer">
  <div class="row">

    <?php
    echo $oscTemplate->getContent('account');
    ?>
<?php /* ** Altered for CCGV ** */ ?>
    <h2><?php echo GIFT_VOUCHER_COUPON; ?></h2>
	<div class="contentText">
        <?php
  if (tep_session_is_registered('customer_id')) {
    $gv_query = tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id = '" . (int)$customer_id . "'");
    $gv_result = tep_db_fetch_array($gv_query);
    if ($gv_result['amount'] > 0 ) {
?>
	<p><?php echo CCGV_BALANCE .':' . $currencies->format($gv_result['amount']); ?></p>
<?php
}
  }
?>    <ul class="accountLinkList">
      <li><span class="ui-icon ui-icon-mail-closed accountLinkListEntry"></span><?php echo '<a href="' . tep_href_link(FILENAME_GV_SEND, '', 'SSL') . '">' . CCGV_SENDVOUCHER . '</a>'; ?></li>
      <li><span class="ui-icon ui-icon-heart accountLinkListEntry"></span><?php echo '<a href="' . tep_href_link(FILENAME_GV_FAQ, '', 'SSL') . '">' . CCGV_FAQ . '</a>'; ?></li>  
    </ul>
<?php /* ** EOF alteration for CCGV ** */ ?>
	</div>
  </div>
</div>

<?php
  require('includes/template_bottom.php');
  require('includes/application_bottom.php');
?>
