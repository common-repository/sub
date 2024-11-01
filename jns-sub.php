<?php
/**
 * Plugin Name: sub
 * Plugin URI: https://www.jns.se/en/wordpress-plugins/
 * Description: Adds a subscription form on your web site with the shortcode [jns_sub] either on pages or in widgets. Extremely light weight (7 kb) and fast plugin with no AJAX or jQuery.
 * Version: 1.0.0
 * Author: JNet Solutions
 * Author URI: https://www.jns.se/en/
 * Text Domain: jns-sub
 * Domain Path: /languages/
 */

if (!defined('ABSPATH')) exit;

function jns_sub_load_plugin_textdomain() {
    $loaded = load_plugin_textdomain( 'jns-sub', FALSE, basename(dirname(__FILE__)).'/languages/');
}
add_action( 'plugins_loaded', 'jns_sub_load_plugin_textdomain' );

$jns_sub_plugin_dir=dirname(__FILE__);
$jns_sub_plugin_url=plugin_dir_url(__FILE__);

function jns_sub_output_HTML($str) {
    $str=str_replace('\\', '', $str);
    return $str;
}

function jns_sub_start() {
    global $jns_sub_plugin_dir;
    global $jns_sub_is_admin;
    $jns_sub_is_admin=current_user_can('manage_options');
    if ($jns_sub_is_admin==true && is_admin()) {
        require_once $jns_sub_plugin_dir . '/admin.php';
        // Add links on plugin page
        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'jns_sub_add_action_links');
        function jns_sub_add_action_links ( $links ) {
            $mylinks = array(
            '<a href="' . admin_url( 'options-general.php?page=JNS-sub-settings' ) . '">' . __("Settings", 'jns-sub') . '</a>',
            '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=plugins@jns.se&item_name=Donation+for+sub" target="_blank">' . __("Donate", 'jns-sub') . '</a>'
            );
            return array_merge( $links, $mylinks );
        }
    } elseif (!is_admin()) {
        require_once $jns_sub_plugin_dir . '/public.php';
    }
}
add_action ('init', 'jns_sub_start');
?>
