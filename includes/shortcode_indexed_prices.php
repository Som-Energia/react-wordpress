<?php
// This file enqueues a shortcode.

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );

add_shortcode( 'som_rw_webforms_indexed_prices', function( $atts ) {
  $default_atts = array();
  $args = shortcode_atts( $default_atts, $atts );
  $output = "
    <div id=\"root\"></div>
  ";
  return $output;
});