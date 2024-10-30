<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Register text domain
 */
function spacexchimp_p016_textdomain() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p016_plugin();

    load_plugin_textdomain( $plugin['text'], false, $plugin['dir'] . '/languages/' );
}
add_action( 'init', $plugin['prefix'] . '_textdomain' );

/**
 * Register a submenu item in the top-level menu item "Settings"
 */
function spacexchimp_p016_register_submenu_page() {

    // Put value of plugin constants into an array for easier access
    $plugin_combo = spacexchimp_p020_plugin();
    $plugin = spacexchimp_p016_plugin();

    // Declare variables
    $parent_slug = 'code';
    $page_title  = $plugin_combo['name'];
    $menu_title  = __( 'JS code', $plugin['text'] );
    $capability  = 'manage_options';
    $menu_slug   = 'code/js';
    $function    = $plugin['prefix'] . '_render_submenu_page';

    add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
}
add_action( 'admin_menu', $plugin['prefix'] . '_register_submenu_page' );

/**
 * Register settings
 */
function spacexchimp_p016_register_settings() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p016_plugin();

    register_setting( $plugin['settings'] . '_settings_group', $plugin['settings'] . '_settings' );
    register_setting( $plugin['settings'] . '_settings_group_si', $plugin['settings'] . '_service_info' );
}
add_action( 'admin_init', $plugin['prefix'] . '_register_settings' );

/**
 * Branded footer text on the plugin's settings page
 */
function spacexchimp_p016_admin_footer_text() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p016_plugin();

    // Get current screen data
    $current_screen = get_current_screen();

    // Return if the page is not a settings page of this plugin
    $settings_page = 'code_page_code/js';
    if ( $settings_page != $current_screen->id ) {
        return;
    }

    // Filter footer text
    function spacexchimp_p016_new_admin_footer_text() {
        $year = date('Y');
        return "Copyright &copy; " . $year . " <a href='https://www.spacexchimp.com' target='_blank'>Space X-Chimp</a> | Click <a href='https://www.spacexchimp.com/store.html' target='_blank'>here</a> to see our other products.";
    }
    add_filter( 'admin_footer_text', $plugin['prefix'] . '_new_admin_footer_text', 11 );
}
add_action( 'current_screen', $plugin['prefix'] . '_admin_footer_text' );

/**
 * Runs during the plugin activation
 */
function spacexchimp_p016_activation() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p016_plugin();

    // Read the plugin service information from the database and put it into an array
    $info = get_option( $plugin['settings'] . '_service_info' );

    // Make the "$info" array if the plugin service information in the database is not exist
    if ( ! is_array( $info ) ) {
        $info = array();
    }

    // Get the activation date of the plugin from the database
    $activation_date = !empty( $info['activation_date'] ) ? $info['activation_date'] : '';

    if ( $activation_date == '' ) {
        $info['activation_date'] = time();
        update_option( $plugin['settings'] . '_service_info', $info );
    }
}
register_activation_hook( $plugin['file'], $plugin['prefix'] . '_activation' );

/**
 * Delete options on uninstall
 */
function spacexchimp_p016_uninstall() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p016_plugin();

    delete_option( $plugin['settings'] . '_settings' );
}
register_uninstall_hook( $plugin['file'], $plugin['prefix'] . '_uninstall' );
