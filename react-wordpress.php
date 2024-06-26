<?php
/**
 * @wordpress-plugin
 * Plugin Name: Som Energia React In Wordpress
 */

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );
define( 'INCLUDES_PATH', plugin_dir_path( __FILE__ ) . '/includes' );

$current_url = isset($_SERVER['REQUEST_URI']) ? esc_url($_SERVER['REQUEST_URI']) : '';
$indexed_prices_build = array('preu-avui', 'indexed-daily-prices', 'precio-hoy', 'gaurko-prezioa', 'prezo-hoxe');
$webforms_test_build = array('contratest', 'sociatest');


if ( strpos_array( $current_url, $indexed_prices_build ) !== false ) {
  define( 'SOMRWINDEXED_PRICES_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/webforms-indexed-prices' );
  define( 'SOMRWINDEXED_PRICES_ASSET_MANIFEST', SOMRWINDEXED_PRICES_WIDGET_PATH . '/build/asset-manifest.json' );
  require_once( INCLUDES_PATH . '/enqueue_indexed_prices.php');
  require_once( INCLUDES_PATH . '/shortcode_indexed_prices.php');
}

if ( strpos_array( $current_url, $webforms_test_build) !== false ) {
  define( 'SOMRW_TEST_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/webforms-test' );
  define( 'SOMRW_TEST_ASSET_MANIFEST', SOMRW_TEST_WIDGET_PATH . '/build/asset-manifest.json' );
  require_once( INCLUDES_PATH . '/enqueue-test.php' );
  require_once( INCLUDES_PATH . '/shortcode-test.php' );
} else {
  define( 'SOMRW_WIDGET_PATH', plugin_dir_path( __FILE__ ) . '/webforms' );
  define( 'SOMRW_ASSET_MANIFEST', SOMRW_WIDGET_PATH . '/build/asset-manifest.json' );
  require_once( INCLUDES_PATH . '/enqueue.php' );
  require_once( INCLUDES_PATH . '/shortcode.php' );
}

// Function to check if any string in array is found in the haystack string
function strpos_array( $haystack, $needles ) {
    if ( ! is_array( $needles ) ) {
        $needles = array( $needles );
    }
    foreach ( $needles as $needle ) {
        if ( strpos( $haystack, $needle ) !== false ) {
            return true;
        }
    }
    return false;
}

