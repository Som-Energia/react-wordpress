<?php
// This file enqueues a shortcode.

defined( 'ABSPATH' ) or die( 'Direct script access disallowed.' );

add_shortcode( 'som_rw_webforms', function( $atts ) {
  $default_atts = array();
  $args = shortcode_atts( $default_atts, $atts );

  $output = <<<XML
    <script type="text/javascript">
      // webforms config
      window.config = {
        API_BASE_URL: 'https://testapiv2.somenergia.coop:4433/',
      }
    </script>

    <div id="root"></div>
  XML;

  return $output;
});