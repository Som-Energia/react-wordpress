<?php
// This file enqueues a shortcode.

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );

add_shortcode( 'som_rw_webforms', function( $atts ) {
  $default_atts = array();
  $args = shortcode_atts( $default_atts, $atts );

  $output = "
    <script type=\"text/javascript\">
      // webforms config
      window.config = {
        API_BASE_URL: 'https://testapi.somenergia.coop:4433/',
      }
    </script>

    <div id=\"root\"></div>
  ";

  return $output;
});