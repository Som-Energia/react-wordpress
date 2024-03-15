<?php
/**
 * @wordpress-plugin
 * Plugin Name: Som Energia React In Wordpress
 */

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );
define( 'INCLUDES_PATH', plugin_dir_path( __FILE__ ) . '/includes' );

$current_url = isset($_SERVER['REQUEST_URI']) ? esc_url($_SERVER['REQUEST_URI']) : '';
$indexed_prices_build = 'indexed-daily-prices';

if (strpos($current_url, $indexed_prices_build)) {
  define( 'SOMRWINDEXED_PRICES_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/webforms-indexed-prices' );
  define( 'SOMRWINDEXED_PRICES_ASSET_MANIFEST', SOMRWINDEXED_PRICES_WIDGET_PATH . '/build/asset-manifest.json' );
  require_once( INCLUDES_PATH . '/enqueue_indexed_prices.php');
  require_once( INCLUDES_PATH . '/shortcode_indexed_prices.php');
} else {
  define( 'SOMRW_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/webforms' );
  define( 'SOMRW_ASSET_MANIFEST', SOMRW_WIDGET_PATH . '/build/asset-manifest.json' );
  require_once( INCLUDES_PATH . '/enqueue.php' );
  require_once( INCLUDES_PATH . '/shortcode.php' );
}
