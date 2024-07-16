<?php
// This file enqueues scripts and styles

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );

add_action( 'init', function() {

  add_filter( 'script_loader_tag', function( $tag, $handle ) {
    if ( ! preg_match( '/^somrw/', $handle ) ) { return $tag; }
    $tag = str_replace( '<script', '<script type="module"', $tag );
    return str_replace( ' src', ' async defer src', $tag );
  }, 10, 2 );

  add_action( 'wp_enqueue_scripts', function() {
    $asset_manifest = json_decode( file_get_contents( SOMRW_ASSET_MANIFEST), true )['index.html'];
    $server_build_absolute_path = get_site_url() . "/wp-content/plugins/react-wordpress/webforms/build/";

    # Loads the js file
    wp_enqueue_script( 'somrw', $server_build_absolute_path . $asset_manifest[ 'file' ], array(), null, true);

    # Loads all css files
    if (isset($asset_manifest['css']) && is_array($asset_manifest['css'])) {
      foreach ($asset_manifest['css'] as $handle => $path) {
          wp_enqueue_style( 'somrw', $server_build_absolute_path . $path);
      }
    }
  });
});
