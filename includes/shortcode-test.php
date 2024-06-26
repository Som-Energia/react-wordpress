<?php
// This file enqueues a shortcode.

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );

add_shortcode( 'som_rw_test_webforms', function( $atts ) {
  $default_atts = array();
  $args = shortcode_atts( $default_atts, $atts );
  $attr_string = "";
  foreach ($atts as $key => $value){
    $attr_string.=" data-{$key}=\"{$value}\"";
  }
  $output = "
    <script type=\"text/javascript\">
      // webforms config
      window.config = {
        API_BASE_URL: 'https://testapi.somenergia.coop/',
	GA_TRAKING_ID: ''
      }
    </script>

    <div id=\"root\" {$attr_string}></div>
  ";

  return $output;
});
