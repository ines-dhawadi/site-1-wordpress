<?php

/*
  Plugin Name: Team Showcase with Slider
  Plugin URI: https://www.wordpress.org/downloads/team-showcase-supreme/
  Description: Team Showcase is a powerful &amp; robust but easy to represent your team/staff members and their profiles with animated &amp; beautiful styled descriptions, skills &amp; links to social media.
  Author: Sk. Abul Hasan
  Author URI: http://www.wpmart.org/
  Version: 2.4
 */
if (!defined('ABSPATH'))
   exit;

define('wpm_6310_plugin_url', plugin_dir_path(__FILE__));
define ( 'WPM_PLUGIN_CURRENT_VERSION', 2.4 );

add_shortcode('wpm_team_showcase', 'wpm_team_showcase_supreme_shortcode');

function wpm_team_showcase_supreme_shortcode($atts)
{
   extract(shortcode_atts(array('id' => ' ',), $atts));
   $ids = (int) $atts['id'];

   ob_start();
   include(wpm_6310_plugin_url . 'shortcode.php');
   return ob_get_clean();
}

add_action('admin_menu', 'team_showcase_supreme_menu');

function team_showcase_supreme_menu()
{
   add_menu_page('WPM Team', 'WPM Team', 'manage_options', 'wpm-team-showcase', 'wpm_6310_home', 'dashicons-id-alt', 90);
   add_submenu_page('wpm-team-showcase', 'WPM Team Showcase', 'All Team', 'manage_options', 'wpm-team-showcase', 'wpm_6310_home');
   add_submenu_page('wpm-team-showcase', 'Template 01-10', 'Template 01-10', 'manage_options', 'wpm-template-01-10', 'wpm_template_01_10');
   add_submenu_page('wpm-team-showcase', 'Template 11-20', 'Template 11-20', 'manage_options', 'wpm-template-11-20', 'wpm_template_11_20');
   add_submenu_page('wpm-team-showcase', 'Template 21-30', 'Template 21-30', 'manage_options', 'wpm-template-21-30', 'wpm_template_21_30');
   add_submenu_page('wpm-team-showcase', 'Add Members', 'Add Members', 'manage_options', 'wpm-team-showcase-team-member', 'wpm_team_6310_team_member');
   add_submenu_page('wpm-team-showcase', 'Add Social Icons', 'Add Social Icons', 'manage_options', 'wpm-team-showcase-social-icon', 'wpm_team_6310_icon');
   add_submenu_page('wpm-team-showcase', 'License', 'License', 'manage_options', 'wpm-team-showcase-license', 'wpm_team_6310_lincense');
   add_submenu_page('wpm-team-showcase', 'Settings', 'Settings', 'manage_options', 'wpm-team-showcase-settings', 'wpm_team_6310_settings'); 
}

function wpm_6310_home()
{
   global $wpdb;
   wp_enqueue_style('wpm-font-awesome-5-0-13', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css');
   wp_enqueue_style('wpm-6310-style', plugins_url('assets/css/style.css', __FILE__));

   $style_table = $wpdb->prefix . 'wpm_6310_style';
   include wpm_6310_plugin_url . 'header.php';
   include wpm_6310_plugin_url . 'home.php';
}

include wpm_6310_plugin_url . 'template-menu.php';

register_activation_hook(__FILE__, 'wpm_team_showcase_supreme_install');
add_action('wp_ajax_wpm_6310_team_member_info222', 'wpm_6310_team_member_info222');

function wpm_6310_team_member_info222()
{
   echo "OK";
   wp_die();
}

add_action('wp_ajax_wpm_6310_team_member_info', 'wpm_6310_team_member_info');



/*
  add_action('wp_head', 'myplugin_ajaxurl');

  function myplugin_ajaxurl() {

  echo '<script type="text/javascript">
  var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
  }
 *
 */

function my_enqueue()
{
   wp_enqueue_script('ajax-script', plugins_url('assets/js/ajaxdata.js', __FILE__), array('jquery'));
   wp_localize_script('ajax-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_enqueue');

if (is_admin()) {
   add_action('wp_ajax_wpm_6310_team_member_details', 'wpm_6310_team_member_details');
} else {
   add_action('wp_ajax_nopriv_wpm_6310_team_member_details', 'wpm_6310_team_member_details');
}

add_action('wp_ajax_nopriv_wpm_6310_team_member_details', 'wpm_6310_team_member_details');





include_once(wpm_6310_plugin_url . 'settings/helper/functions.php');
