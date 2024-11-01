=== sub ===
Contributors: jnetsolutions
Donate link: https://www.jns.se/en/wordpress-plugins/
Tags: subscribe,subscription form,enumeration,newsletter,newsletter form,sub
Requires at least: 3.0.1
Tested up to: 4.4.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Gives functionality to easy add a subscription form to your web site. Extremely light weight (6 kb), fast/safe plugin with no AJAX or jQuery.

== Description ==

Sub let your visitors subscribe to your newsletter. All the subscribers email addresses turns up in your admin panel. Note that this plugin do not have functionality to _send_ newsletters, only to collect email addresses in a simple way.

Because sub do not use jQuery, Javascript or iframes the page will reload before showing a thank you message. This can be confusing for the visitor if the subscription form is not positioned on the top of the screen, as the visitor then will have to scroll down to see the message.

Sub is translation ready and currently available in English and Swedish.

Not tested on old WordPress versions, but we see no reason why it would not work on them so feel free to test it on any version you want.


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/jns-sub` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use shortcode [jns_sub] on pages, widgets or anywhere where you want to show the subscription form.


== Frequently Asked Questions ==

= Can I change the text on the subscription form? =

Yes, just edit the translation files


= Can I change the design of the subscription form? =

Yes, just add appropriate CSS code to your existing CSS file. The classes used are "jns_sub_form_textfield", "jns_sub_form_submit" and "jns_sub_thankyou".


= Do sub collect names as well as email addresses? =

No, the free version of sub collects only email addresses


= Can I export email addresses is various formats? =

No, in the free version you need to copy the email addresses to your email- or newsletter program. The admin settings page will show you all email addresses comma separated which should make it easy for you to quickly copy it all in a chunk to any program.


== Screenshots ==

1. Newsletter form example, not styled
2. Admin page with collected email addresses


== Changelog ==

= 1.0 =
* Initial release