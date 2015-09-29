<?php

/*
  Plugin Name: TransitArt
  Author: Inovatica
  Version: 1.0
  Description: TransitArt - Material UI Timetables KIT. Easy visualization of passenger information for your website and mobile app.
  Domain Path: /lang/
  Plugin URI: http://transitart.io/
  Author URI: http://inovatica.com/
 */
define('TA_PATH', plugin_dir_path(__FILE__));
require TA_PATH . 'funcitons.php';

add_option( "ta_show_credits", "0");
add_action('plugins_loaded', 'ta_load_textdomain');


if (is_admin()) {
    add_action('admin_menu', 'ta_plugin_menu');
    add_action('admin_head', 'ta_admine_header');
}
?>