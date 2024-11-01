<?php
// Public functionality

// Security: Exit if accessed directly
if (!defined('ABSPATH')) exit;

// Enable shortcode in widgets
if ( !is_admin() ){
    add_filter('widget_text', 'do_shortcode', 11);
}

global $jns_sub_subscribed; $jns_sub_subscribed=false;

function jns_sub_show_subscribe_form() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo '<p>' . __("Your Email", 'jns-sub') . '</p>';
    echo '<input type="email" name="jns_sub_email" class="jns_sub_form_textfield" size="40" style="max-width:100%" /><br />';
    echo '<input type="submit" name="jns_sub_submit" value="' . __("Subscribe", 'jns-sub') . '" class="jns_sub_form_submit" />';
    echo '</form>';
}

function jns_sub_shortcode() {
    global $jns_sub_subscribed;
    ob_start();
    jns_sub_add_subscriber();
    if ($jns_sub_subscribed==false) {
      jns_sub_show_subscribe_form();
    }
    return ob_get_clean();
}
add_shortcode('jns_sub', 'jns_sub_shortcode');

function jns_sub_add_subscriber() {
    global $jns_sub_subscribed;
    if (isset($_POST['jns_sub_email'])) {
        $jns_sub_email = trim(sanitize_email($_POST["jns_sub_email"]), ",; ");
        if (strpos($jns_sub_email, "@")>0) {
          $JNS_sub_subscribers = trim(get_option('JNS_sub_subscribers'), ",; ");
          $JNS_sub_subscribers = ',' . $JNS_sub_subscribers . ',';
          $JNS_sub_subscribers = str_replace(','.$jns_sub_email.',', "," , $JNS_sub_subscribers);
          $JNS_sub_subscribers = trim($JNS_sub_subscribers, ",;. ");
          if (strpos($JNS_sub_subscribers, "@") == false) {
            $JNS_sub_subscribers=$jns_sub_email;
          } else {
            $JNS_sub_subscribers .= "," . $jns_sub_email;
          }
          update_option('JNS_sub_subscribers', $JNS_sub_subscribers);
          echo '<strong class="jns_sub_thankyou">' . __("You are now a subscriber!", 'jns-sub') . '</strong><br /><br />';
          $jns_sub_subscribed=true;
        }
    }
}
?>
