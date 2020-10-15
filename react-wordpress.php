<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Som Energia React In Wordpress
 */

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );

define( 'SOMRW_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/webforms' );
define( 'SOMRW_ASSET_MANIFEST', SOMRW_WIDGET_PATH . '/build/asset-manifest.json' );
define( 'SOMRW_INCLUDES', plugin_dir_path( __FILE__ ) . '/includes' );

define( 'SOMRW_STATIC', '/wp-content/plugins/react-wordpress/webforms/build');

require_once( SOMRW_INCLUDES . '/enqueue.php' );
require_once( SOMRW_INCLUDES . '/shortcode.php' );