<?php
/*
Plugin Name: Advertorial helper
Plugin URI: #
Description: This plugin ads an external url field & an impressions tag field 
Author: Mylonas Dimitris
Author URI: https://stackoverflow.com/users/4208466/kaize?tab=profile
Text Domain: advertorial-helper
Version: Development
License: GPL2
*/

if (!defined('ABSPATH')) {
  exit;
}

define( 'ADVER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( ADVER__PLUGIN_DIR . 'functions.php' );
require_once( ADVER__PLUGIN_DIR . 'settings.php' );

register_activation_hook( __FILE__, 'acfreq_plugin_activate' );
function acfreq_plugin_activate(){
    // Require parent plugin
    if ( (is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) and current_user_can( 'activate_plugins' )) || (is_plugin_active( 'advanced-custom-fields/acf.php' ) and current_user_can( 'activate_plugins' )) ) {
        // Stop activation redirect and show error

    } else {
    	wp_die('Sorry, but this plugin requires the Advance custom fields (acf) Plugin to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    }


}