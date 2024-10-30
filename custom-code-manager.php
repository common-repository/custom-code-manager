<?php
/**
 * Plugin Name: Custom Code Manager
 * Plugin URI: https://github.com/ArthurGareginyan/custom-code-manager
 * Description: Easily and safely add your custom PHP/HTML/CSS/JavaScript code to your WordPress website, directly out of the WordPress Admin Area, without the need to have an external editor.
 * Author: Space X-Chimp
 * Author URI: https://www.spacexchimp.com
 * Version: 1.18
 * License: GPL3
 * Text Domain: custom-code-manager
 * Domain Path: /languages/
 *
 * Copyright 2019-2021 Space X-Chimp ( website : https://www.spacexchimp.com )
 *
 * This plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this plugin. If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗██████╗  █████╗  ██████╗███████╗    ██╗  ██╗      ██████╗██╗  ██╗██╗███╗   ███╗██████╗
 * ██╔════╝██╔══██╗██╔══██╗██╔════╝██╔════╝    ╚██╗██╔╝     ██╔════╝██║  ██║██║████╗ ████║██╔══██╗
 * ███████╗██████╔╝███████║██║     █████╗       ╚███╔╝█████╗██║     ███████║██║██╔████╔██║██████╔╝
 * ╚════██║██╔═══╝ ██╔══██║██║     ██╔══╝       ██╔██╗╚════╝██║     ██╔══██║██║██║╚██╔╝██║██╔═══╝
 * ███████║██║     ██║  ██║╚██████╗███████╗    ██╔╝ ██╗     ╚██████╗██║  ██║██║██║ ╚═╝ ██║██║
 * ╚══════╝╚═╝     ╚═╝  ╚═╝ ╚═════╝╚══════╝    ╚═╝  ╚═╝      ╚═════╝╚═╝  ╚═╝╚═╝╚═╝     ╚═╝╚═╝
 *
 */


/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Define global constants
 */
$plugin_data = get_file_data( __FILE__,
                              array(
                                     'name'    => 'Plugin Name',
                                     'version' => 'Version',
                                     'text'    => 'Text Domain'
                                   )
                            );
function spacexchimp_p020_define_constants( $constant_name, $value ) {
    $constant_name = 'SPACEXCHIMP_P020_' . $constant_name;
    if ( ! defined( $constant_name ) )
        define( $constant_name, $value );
}
spacexchimp_p020_define_constants( 'FILE', __FILE__ );
spacexchimp_p020_define_constants( 'DIR', dirname( plugin_basename( __FILE__ ) ) );
spacexchimp_p020_define_constants( 'BASE', plugin_basename( __FILE__ ) );
spacexchimp_p020_define_constants( 'URL', plugin_dir_url( __FILE__ ) );
spacexchimp_p020_define_constants( 'PATH', plugin_dir_path( __FILE__ ) );
spacexchimp_p020_define_constants( 'SLUG', dirname( plugin_basename( __FILE__ ) ) );
spacexchimp_p020_define_constants( 'NAME', $plugin_data['name'] );
spacexchimp_p020_define_constants( 'VERSION', $plugin_data['version'] );
spacexchimp_p020_define_constants( 'TEXT', $plugin_data['text'] );
spacexchimp_p020_define_constants( 'PREFIX', 'spacexchimp_p020' );
spacexchimp_p020_define_constants( 'SETTINGS', 'spacexchimp_p020' );

/**
 * A useful function that returns an array with the contents of the plugin constants
 */
function spacexchimp_p020_plugin() {
    $array = array(
        'file'     => SPACEXCHIMP_P020_FILE,
        'dir'      => SPACEXCHIMP_P020_DIR,
        'base'     => SPACEXCHIMP_P020_BASE,
        'url'      => SPACEXCHIMP_P020_URL,
        'path'     => SPACEXCHIMP_P020_PATH,
        'slug'     => SPACEXCHIMP_P020_SLUG,
        'name'     => SPACEXCHIMP_P020_NAME,
        'version'  => SPACEXCHIMP_P020_VERSION,
        'text'     => SPACEXCHIMP_P020_TEXT,
        'prefix'   => SPACEXCHIMP_P020_PREFIX,
        'settings' => SPACEXCHIMP_P020_SETTINGS
    );
    return $array;
}

/**
 * Put value of plugin constants into an array for easier access
 */
$plugin_combo = spacexchimp_p020_plugin();

/**
 * Exit if the premium version of this plugin is active
 */
$plugin_other = $plugin_combo['slug'] . '-pro/' . $plugin_combo['slug'] . '-pro.php';
function spacexchimp_p020_is_plugin_active_for_network( $plugin_other ) {
	if ( ! is_multisite() ) {
		return false;
	}

	$plugins = get_site_option( 'active_sitewide_plugins' );
	if ( isset( $plugins[ $plugin_other ] ) ) {
		return true;
	}

	return false;
}
function spacexchimp_p020_is_plugin_active( $plugin_other ) {
	return in_array( $plugin_other, (array) get_option( 'active_plugins', array() ) ) || spacexchimp_p020_is_plugin_active_for_network( $plugin_other );
}
if ( spacexchimp_p020_is_plugin_active( $plugin_other ) ) {
    return;
}

/**
 * Load the plugin modules
 */
require_once( $plugin_combo['path'] . 'inc/php/core.php' );
require_once( $plugin_combo['path'] . 'inc/php/upgrade.php' );
require_once( $plugin_combo['path'] . 'inc/php/versioning.php' );
require_once( $plugin_combo['path'] . 'sub/html/main.php' );
require_once( $plugin_combo['path'] . 'sub/js/main.php' );
require_once( $plugin_combo['path'] . 'sub/php/main.php' );
require_once( $plugin_combo['path'] . 'sub/css/main.php' );
