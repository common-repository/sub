<?php
// Admin settings page

global $jns_sub_is_admin;
if (!defined( 'ABSPATH' ) || !is_admin() || $jns_sub_is_admin!=true) exit;

global $jns_sub_plugin_url;
$JNS_sub_subscribers="";
$jns_sub_settings_updated=false;

echo '<br /><br />';
echo '<div style="width:100px;float:left;"><a href="http://www.jns.se" target="_blank"><img src="'.$jns_sub_plugin_url.'images/logo.png" width=75 height=75 border=0></a></div>';
echo '<div style="margin-left:100px;"><strong>sub</strong><br />by <a href="https://www.jns.se/en/wordpress-plugins/" target="_blank">JNet Solutions</a><br /><br /><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=plugins@jns.se&item_name=Donation+for+sub" target="_blank" style="text-decoration:none;">Make a donation</a></div><br clear="all" /><br />';

echo '<div style="width:800px;max-width:100%;">' . __("Here below are your collected subscribers. You can edit them as you want, but remember to separate them with , (comma) and be careful not to delete them all. It can be a good idea to copy them sometimes to a local txt-file on your computer.", 'jns-sub') . '</div><br /><br />';
if (!empty($_POST)) {
  $JNS_sub_subscribers=trim($_POST["JNS_sub_subscribers"], ",; ");
  if (strpos($JNS_sub_subscribers,"@") > 0) {
    $JNS_sub_subscribers = str_replace(" ", "" , $JNS_sub_subscribers);
    update_option('JNS_sub_subscribers', $JNS_sub_subscribers);
    $jns_sub_settings_updated=true;
  } else {
    update_option('JNS_sub_subscribers', '');
  }
}
if ($jns_sub_settings_updated==false) {
  $JNS_sub_subscribers = get_option('JNS_sub_subscribers');
}

if ($JNS_sub_subscribers=="") {
  echo '<font style="color:red;">' . __("No subscribers yet. Why don't you start by adding yourself to get that number up?", 'jns-sub') . '</font>';
} else {
  $jns_sub_count=substr_count($JNS_sub_subscribers, ",")+1;
  echo '<font style="color:green;">' . $jns_sub_count . ' ';
  if ($jns_sub_count>1) {
    echo __("subscribers", 'jns-sub');
  } else {
    echo __("subscriber", 'jns-sub');
  }
  echo '</font>';
}
echo '<br />';

echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
echo '<div style="display:inline-block;max-width:100%;"">';
echo '<br />' . __("Email addresses separated with comma (,):", 'jns-sub') . '<br /><textarea name="JNS_sub_subscribers" style="width:400px;max-width:100%;margin-right:20px;" rows=7>'.jns_sub_output_HTML($JNS_sub_subscribers).'</textarea>';
echo '</div>';
echo '<br /><input type="submit" value="' . __("Update subscriber list", 'jns-sub') . '">';
echo '</form>';

if ($jns_sub_settings_updated==true) { echo '<br />' . __("Updated", 'jns-sub'); }
?>
