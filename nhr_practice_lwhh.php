<?php
/**
 * Plugin Name: NHR Practice LWHH
 * Description: This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      nayeemhr
 * Author URI:  https://nayeemhr.com/
 * Text Domain: nhr-practice-lwhh
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function nhr_practice_lwhh()
{

    // Load plugin file
    require_once __DIR__ . '/includes/plugin.php';

    // Run the plugin
    \NHR_Practice_Elementor_Addon\Plugin::instance();

}
add_action('plugins_loaded', 'nhr_practice_lwhh');
