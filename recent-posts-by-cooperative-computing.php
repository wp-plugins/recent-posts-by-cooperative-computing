<?php
/**
 * Plugin Name: Recent Posts by Cooperative Computing
 * Plugin URI: http://cooperativecomputing.com
 * Description: A plugin which enables you to get recent posts by authors, categories and tags as well, also you can enable featured images and excerpt, this plugin can be use for custom post types. It has shortcode and a widget as well.
 * Version: 1.0
 * Author: Cooperative Computing
 * Author URI: http://cooperativecomputing.com
 */

// Shortcode
require_once('includes/shortcode-core.php');

// Widget
require_once('includes/widget-core.php');

// Registering Styles
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );
function register_plugin_styles() {
    wp_register_style( 'recent-post-by-cc-style', plugins_url( 'assets/css/recent-post-by-cc.css', __FILE__ ) );
    wp_enqueue_style( 'recent-post-by-cc-style' );
}