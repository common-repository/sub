<?php
// Admin functionality

global $jns_sub_is_admin;
if (!defined( 'ABSPATH' ) || !is_admin() || $jns_sub_is_admin!=true) exit;

add_action( 'admin_menu', 'jns_sub_plugin_menu' );
function jns_sub_plugin_menu() {
	add_options_page( 'Sub', 'Sub', 'manage_options', 'JNS-sub-settings', 'jns_sub_settings' );
}
function jns_sub_settings() {
	global $jns_sub_plugin_dir;
	require $jns_sub_plugin_dir . '/admin_settings.php';
}
?>
